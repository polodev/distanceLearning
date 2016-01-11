<div class="container">
    <div class="carousel slide" data-ride="carousel" id="carousel-example">
        <ol class="carousel-indicators">
            <li data-target="#carousel-example" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example" data-slide-to="1"></li>
            <li data-target="#carousel-example" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">
            <div class="item active">
                <img src="{{ asset('frontendf/images/slide1.jpg') }}" alt="Slide">

                <div class="carousel-caption">
                    <h3>This is a caption</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, necessitatibus.</p>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('frontendf/images/slide2.jpg') }}" alt="Slide">

                <div class="carousel-caption">
                    <h3>This is a caption</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, necessitatibus.</p>
                </div>
            </div>
            <div class="item">
                <img src="{{ asset('frontendf/images/slide3.jpg') }}" alt="Slide">

                <div class="carousel-caption">
                    <h3>This is a caption</h3>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, necessitatibus.</p>
                </div>
            </div>
        </div>

        <a href="#carousel-example" class="left carousel-control" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a href="#carousel-example" class="right carousel-control" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>
