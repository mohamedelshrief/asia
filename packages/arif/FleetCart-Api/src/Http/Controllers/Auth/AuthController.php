<?php

namespace FleetCartApi\Http\Controllers\Auth;
use Exception;
use Auth;
use FleetCartApi\Entities\User;
use FleetCartApi\Http\Controllers\Auth\BaseAuthController;
use FleetCartApi\Http\Requests\LoginRequest;
use FleetCartApi\Http\Requests\RegisterRequest;
use Cartalyst\Sentinel\Checkpoints\NotActivatedException;
use Cartalyst\Sentinel\Checkpoints\ThrottlingException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Modules\User\Contracts\Authentication;
use Modules\User\Http\Requests\UpdateProfileRequest;
use Modules\User\Mail\Welcome;
use FleetCart\Mail\EmailChange;
use Modules\Address\Entities\Address;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Rels;
use Illuminate\Support\Facades\Storage;
use Modules\Notification\Entities\Notification;
use Modules\User\LoginProvider;
use Illuminate\Support\Facades\Cache;
use Laravel\Socialite\Facades\Socialite;
use File;

class AuthController extends BaseAuthController
{
    /**
     * The Authentication instance.
     *
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;

//        $this->middleware('api:guest')->except('getLogout');
    }
    //
    protected function redirectTo()
    {
        // TODO: Implement redirectTo() method.
    }

    protected function loginUrl()
    {
        // TODO: Implement loginUrl() method.
    }

    public function getLogin()
    {
        // TODO: Implement getLogin() method.
    }

    /**
     * Register a user.
     *
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function postRegister(RegisterRequest $request): JsonResponse
    {
        $request->merge(['password' => bcrypt(request('password'))]);

        $data = $request->only(['first_name', 'last_name', 'email','player_id', 'password','phone']);

        $user = User::create($data);

        $this->assignCustomerRole($user);

        if (setting('welcome_email')) {
            Mail::to($request->email)
                ->send(new Welcome($request->first_name));
        }

        $token = $user->createToken('Web Token')->accessToken;

        return response()->json([
            'message' => trans('fleetcart_api::messages.account_created'),
            'token' => $token,
            'user' => $user,
        ], Response::HTTP_CREATED);
    }

    /**
     * Login a user.
     *
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function postLogin(LoginRequest $request): JsonResponse
    {

        $user = User::whereEmail($request->email)->first();

        if($user->is_delete==1){
            return response()->json([
                'message' => trans('fleetcart_api::validation.auth.invalid_password')
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if(!Hash::check($request->password, $user->password))
        {
            return response()->json([
                'message' => trans('fleetcart_api::validation.auth.invalid_password')
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            User::where("id",$user->id)->update(["player_id"=>$request->player_id]);
            $token = $user->createToken('Web Token')->accessToken;
            $userData=User::where("id",$user->id)->first();
            return response()
                ->json([
                'token' => $token,
                'user' => $userData
            ]);
        } catch (NotActivatedException $e) {
            return response()
                ->json([
                    'message' => trans('fleetcart_api::validation.auth.account_not_activated')
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (ThrottlingException $e) {
            return response()->json([
                'message' => trans('fleetcart_api::validation.auth.account_is_blocked', ['delay' => $e->getDelay()])
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function handleProviderCallback(Request $request)
    {

        $request->validate([
            "provider"=>"required",
            "user_id"=>"required",
        ]);

        $provider=$request->provider;
        $user_id=$request->user_id;
        $name1="Customer";
        $name2="User";
        $name=null;
        if($request->user_name!=""){
            $name=explode(' ', $request->user_name, 2);
        }
        if(isset($name[0])){
            $name1=$name[0];
        }
        if(isset($name[1])){
            $name2=$name[1];
        }

        $user = User::where('provider', $provider)->where('provider_id', $user_id)->first();
        // if there is no record with these data, create a new user
        //return  $user ;
        if($user==""){
            $user = User::create([
                'first_name'=>$name1,
                'last_name'=>$name2,
                'email'=>$request->email,
                'provider' => $provider,
                'provider_id' => $user_id,
                'player_id' => $request->player_id,
                'is_social'=>1
            ]);
        }

        // create a token for the user, so they can login
        $token = $user->createToken('Web Token')->accessToken;
        // return the token for usage

        $loginUser=User::where("id",$user->id)->update(["player_id"=>$request->player_id]);
        $userData=User::where("id",$user->id)->first();

        return response()->json([
            'success' => true,
            "user"=>$userData,
            'token' => $token
        ]);

    }

    public function getUserDetails($id,$player_id){
        try {
            $loginUser=User::where("id",$id)->update(["player_id"=>$player_id]);
            $token = $loginUser->createToken('Web Token')->accessToken;
            $userData=User::where("id",$id)->first();
            return response()
                ->json([
                'token' => $token,
                'user' => $userData
            ]);
        } catch (NotActivatedException $e) {
            return response()
                ->json([
                    'message' => trans('fleetcart_api::validation.auth.account_not_activated')
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
        } catch (ThrottlingException $e) {
            return response()->json([
                'message' => trans('fleetcart_api::validation.auth.account_is_blocked', ['delay' => $e->getDelay()])
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function me(Request $request){
        $user = auth('api')->user();

        $extend_me = config('fleetcart_api.extend_me');

        if(!$extend_me){
            return $user;
        }

        list($class, $method) = explode('@', $extend_me);

        $extend_me = new $class();

        return $extend_me->{$method}($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProfileRequest $request
     * @return JsonResponse|Response
     */
    public function update_me(UpdateProfileRequest $request)
    {
        //return $request->all();
        if($request->password !="" && $request->old_password!=""){
            if(!Hash::check($request->old_password, auth('api')->user()->password)){
                return response(['message' => 'Old password is invalid'], 403);
            }
            $request->bcryptPassword();
        }
        if ($request->has('image')) {
            $image = $request->image;  // your base64 encoded
            $image = str_replace('data:image/png;base64,', '', $image);
            $image = str_replace('data:image/jpg;base64,', '', $image);
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = date("dmYhis").uniqid() .'.'.'png';
            File::put(public_path(). '/storage/media/' . $imageName, base64_decode($image));
            $request['image']="/storage/media/".$imageName;
        }else{

            unset($request['image']);
        }
        auth('api')->user()->update($request->all());
        return \response()->json(["user"=>auth('api')->user(),'message' => trans('account::messages.profile_updated')]);
    }

    public function getReset()
    {
        // TODO: Implement getReset() method.
    }

    public function logout(Request $request)
    {
        /** @var User $user */
        Auth::logout();
        //$token = $request->user()->token();
        //$token->revoke();
        return response(['message' => 'You have been successfully logged out!'], 200);
    }
    protected function resetCompleteRoute($user, $code)
    {
        // TODO: Implement resetCompleteRoute() method.
    }

    protected function resetCompleteView()
    {
        // TODO: Implement resetCompleteView() method.
    }

    public function get_addresses(){
        $addresses= Address::where("customer_id",auth('api')->user()->id)->get();
        return \response()->json(compact('addresses'));
    }

    public function add_address(Request $request){
        $request->validate([
            "first_name"=>"required|regex:/(^([a-z A-Z]+)(\d+)?$)/u",
            "last_name"=>"required|regex:/(^([a-z A-Z]+)(\d+)?$)/u",
            "address_1"=>"required",
            "city"=>"required",
            "zip"=>"required",
            "country"=>"required",
        ]);
        if($request->default_address==1){
            Address::where("customer_id",auth('api')->user()->id)->update(["default_address"=>0]);
        }


        $address=new Address;
        $address->customer_id=auth('api')->user()->id;
        $address->first_name=$request->first_name;
        $address->last_name=$request->last_name;
        $address->address_1=$request->address_1;
        $address->city=$request->city;
        $address->state=$request->state;
        $address->zip=$request->zip;
        $address->country=$request->country;
        $address->phone=$request->phone;
        $address->latitude=$request->latitude;
        $address->longitude=$request->longitude;
        $address->label=$request->label;
        $address->default_address=$request->default_address;
        $address->save();

        return response(['message' => 'Address Added Successfully'], 200);
    }


    public function delete_address(Request $request){
        Address::where("id",$request->id)->delete();
        return response(['message' => 'Address Deleted'], 200);

    }
    public function update_address(Request $request,$id){


        if($request->default_address==1){
            Address::where("customer_id",auth('api')->user()->id)->update(["default_address"=>0]);
        }

        Address::where("id",$id)->update($request->all());


        return response(['message' => 'Address Updated'], 200);

    }

    public function notifications(){

        $notifications = new Notification();
        $user_id = auth("api")->user()->id;
        $notification_data=$notifications->where('notifiable_id', $user_id)->paginate(20);
       // Notification::update(["read_at"=>date("d")]);
        return $notification_data;

    }

    public function UpdateEmail(Request $request){
        $request->validate([
            "email"=>"required|email"
        ]);

        $code=rand(1000,9999);

        Mail::to($request->email)->send(new EmailChange($request->email,$code));

        User::where("id",auth("api")->user()->id)->update(["email_code"=>$code]);

        return response(['message' => 'Email verification code sent successfully'], 200);
    }

    public function verifyChangeEmail(Request $request){
        $request->validate([
            "email"=>"required|email",
            "code"=>"required|min:4|max:4"
        ]);

        $code=auth("api")->user()->email_code;

        if($code==$request->code){
            User::where("id",auth("api")->user()->id)->update(["email_code"=>"","email"=>$request->email]);

            $user=User::where("id",auth("api")->user()->id)->first();
            $token = $user->createToken('Web Token')->accessToken;
            $userData=User::where("id",auth("api")->user()->id)->first();
            return response()
                ->json([
                'message' => 'Email verified and changed',
                'token' => $token,
                'user' => $userData
            ]);

            //return response(['message' => 'Email verified and changed'], 200);
        }else{

            return response(['message' => 'Incorrect verificaton code'], 400);
        }
    }


    public function deleteUser(){
        User::where("id",auth("api")->user()->id)->update(["is_delete"=>1,"email"=>"delete_".auth("api")->user()->email]);

        return response(['message' => 'Account Deleted Successfully'], 200);
    }
}
