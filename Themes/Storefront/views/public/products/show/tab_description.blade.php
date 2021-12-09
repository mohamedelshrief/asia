<div id="description" class="tab-pane description" :class="{ active: activeTab === 'description' }">
    {!! html_entity_decode($product->description)  !!}
</div>
