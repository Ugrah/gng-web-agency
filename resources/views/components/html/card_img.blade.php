<div class="card bg-dark border-light">
    <img class="card-img" src="{{ $imgPath }}" alt="Card image cap">
    <div class="card-img-overlay">
        <h5 class="card-title">{{ $title }}</h5>
        <div class="row card-text">
            <div class="col text-light ">{{ $textRight }}</div>
            <div class="col text-light text-right">{{ $textLeft }}</div>
        </div>
    </div>
    <div class="card-footer">
        <small class="text-muted">{{ $footer }}</small>
    </div>
</div>