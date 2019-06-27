<div id="carouselPricesControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <div class="row justify-content-center mt-3">
            <h3 class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.showcase.title')}}</h3>
            <p class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.showcase.description')}}</p>
            <div class="container">
                <div class="card-columns text-center">
                    @foreach($prices['showcase'] as $price)
                        {{ Html::price_box(
                            $price['title'],
                            $price['amount']['other'],
                            $price['options'],
                            $price['unity']['other']
                        ) }}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="carousel-item">
        <div class="row justify-content-center mt-3">
            <h3 class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.portfolio.title')}}</h3>
            <p class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.portfolio.description')}}</p>
            <div class="container">
                <div class="card-columns text-center">
                    @foreach($prices['portfolio'] as $price)
                        {{ Html::price_box(
                            $price['title'],
                            $price['amount']['ma'],
                            $price['options'],
                            $price['unity']['ma']
                        ) }}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="carousel-item">
        <div class="row justify-content-center mt-3">
            <h3 class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.e_commerce.title')}}</h3>
            <p class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.e_commerce.description')}}</p>
            <div class="container">
                <div class="card-columns text-center">
                    @foreach($prices['e_commerce'] as $price)
                        {{ Html::price_box(
                            $price['title'],
                            $price['amount']['ma'],
                            $price['options'],
                            $price['unity']['ma']
                        ) }}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="carousel-item">
        <div class="row justify-content-center mt-3">
            <h3 class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.catalog.title')}}</h3>
            <p class="col-10 col-md-8 text-center">{{ trans('front/pages/prices.section0.website.catalog.description')}}</p>
            <div class="container">
                <div class="card-columns text-center">
                    @foreach($prices['catalog'] as $price)
                        {{ Html::price_box(
                            $price['title'],
                            $price['amount']['ma'],
                            $price['options'],
                            $price['unity']['ma']
                        ) }}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselPricesControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselPricesControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<style>
span.carousel-control-prev-icon{background-color: red; color: blue;}
</style>