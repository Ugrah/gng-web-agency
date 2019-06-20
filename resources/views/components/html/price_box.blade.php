<div class="card wow fadeInUpBig">
    <div class="card-header price-title">
    <h4 class="text-white nopadding">{{$name}}</h4>
    </div>
    <div class="card-body nopadding bg-light">
    <small class="text-muted">{{ trans('front/pages/index.section2.from')}}</small>
    <p class="card-text display-4">{{$amount}} <span style="font-size: 0.5em">Dh</span></p>

    <ul class="list-group mb-3">
        @foreach($options as $option)
            {!! $option !!}
        @endforeach
    </ul>

    @if(isset($urlButton))
        <a href="{{ $urlButton }}" class="btn btn-primary btn-custom-gradient rounded px-4 py-2 mb-3">{{ trans('front/pages/index.section2.button')}}</a>
    @endif
    
    </div>
</div>