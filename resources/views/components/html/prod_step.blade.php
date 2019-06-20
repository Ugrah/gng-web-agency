<!--
<div class="col-10 col-md-6 col-lg-3 nopadding >
-->
<div class="card bg-light p-2 mb-3 border-0 {{ $wowEffect }} wow" data-wow-delay="{{ $wowDelay }}" style="min-width: 16rem;">
    <div class="card-body">
        <span class="fa-stack mb-2">
            <i class="{{ $iconClass }} fa-3x fa-stack-1x text-primary"></i>
            @if(isset($iconClassSecond))<i class="{{ $iconClassSecond }} fa-3x fa-stack-1x text-success"></i>@endif
        </span>
        <p class="card-text">{{ $content }}</p>
    </div>
</div>