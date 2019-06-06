<div id="home-carousel" class="carousel slide h-100 w-100 position-absolute" style="top:0; left:0" data-ride="carousel" data-touch="true">
    <ul class="carousel-indicators">
        <li data-target="#home-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#home-carousel" data-slide-to="1"></li>
        <li data-target="#home-carousel" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner text-light h-100">
        <div class="carousel-item h-100 active">
            <div class="row h-100">
                <div class="col-10 offset-1 col-md-4 my-auto">
                    <h2>{{ trans('front/pages/index.carousel.item1.title') }}</h2>
                    <p>{{ trans('front/pages/index.carousel.item1.description') }}</p>
                    <div class="row">
                        <div class="col wow bounceInLeft">
                            <button type="button" class="btn btn-primary btn-lg btn-block rounded">{{ trans('front/pages/index.carousel.item1.button1') }}</button>
                        </div>
                        <div class="col wow bounceInRight">
                            <button type="button" class="btn btn-success btn-lg btn-block rounded">{{ trans('front/pages/index.carousel.item1.button2') }}</button>
                        </div>
                    </div>
                </div>
                <div class="col-10 offset-1 col-md-5 my-auto">
                    <img class="img-fluid" src="http://www.pngall.com/wp-content/uploads/2016/07/Responsive-Web-Design-Transparent.png" alt="{{ trans('front/pages/index.carousel.item1.img-alt')}}" />
                </div>
            </div>  
        </div>

        <div class="carousel-item h-100">
            <div class="row h-100">
                <div class="col-10 offset-1 col-md-4 my-auto">
                    <h2>{{ trans('front/pages/index.carousel.item2.title') }}</h2>
                    <p>{{ trans('front/pages/index.carousel.item2.description') }}</p>
                    <div class="row">
                        <div class="col">
                            <button type="button" class="btn btn-primary btn-lg btn-block">{{ trans('front/pages/index.carousel.item2.button1') }}</button>
                        </div>
                        <div class="col">
                            <button type="button" class="btn btn-success btn-lg btn-block">{{ trans('front/pages/index.carousel.item2.button2') }}</button>
                        </div>
                    </div>
                </div>
                <div class="col-10 offset-1 col-md-5 my-auto">
                    <h2>Zone 2</h2>
                    <p>This is text to test the zone 1</p>
                </div>
            </div>    
        </div>

        <div class="carousel-item h-100">
            <div class="row h-100">
                <div class="col-10 offset-1 col-md-4 my-auto">
                    <h2>Zone 1</h2>
                    <p>Vestibulum pretium neque vel ipsum feugiat, id commodo libero auctor. Nam commodo blandit dolor ut malesuada. Nunc nibh odio, blandit vel suscipit a, placerat eu lectus. </p>
                </div>
                <div class="col-10 offset-1 col-md-5 my-auto">
                    <h2>Zone 2</h2>
                    <p>This is text to test the zone 1</p>
                </div>
            </div>    
        </div>

    </div>
</div>