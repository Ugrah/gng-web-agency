<div class="col-md-4">
    <div class="item-preview mb-4">
        <a href="{{ route('show.production', ['id' => $production->id]) }}" class="item-preview-img d-block mb-3"><img class="lazy-rounded card-img" src="{{ $production->getImagePath() }}" alt="Card image cap"></a>
        <div class="item-preview-title">{{ $production->name }}</div>
        <div class="item-preview-short-description">Short description</div>
    </div>
</div>