@extends('layouts.app')

@section('body-class','landing-page')

@section('styles')
    <style>
        .team .row .col-md-4{
            margin-bottom: 5em;
        }

        .row{
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            flex-wrap:wrap;
        }
        .row > [class*='col-']{
            display:flex;
            flex-direction:column;
        }

    </style>
@endsection

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="title">Bienvenido a {{ config('app.name') }}</h1>
                <h4>Every landing page needs a small description after the big bold title, that's why we added this text here. Add here all the information that can make you or your product create the first impression.</h4>
                <br />
                <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-danger btn-raised btn-lg">
                    <i class="fa fa-play"></i> Watch video
                </a>
            </div>
        </div>
    </div>
</div>

<div class="main main-raised">
    <div class="container">
        <div class="section text-center section-landing">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="title">¿Porqué APP Shop?</h2>
                    <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn't scroll to get here. Add a button if you want the user to see more.</h5>
                </div>
            </div>

            <div class="features">
                <div class="row">
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-primary">
                                <i class="material-icons">chat</i>
                            </div>
                            <h4 class="info-title">First Feature</h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-success">
                                <i class="material-icons">verified_user</i>
                            </div>
                            <h4 class="info-title">Second Feature</h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info">
                            <div class="icon icon-danger">
                                <i class="material-icons">fingerprint</i>
                            </div>
                            <h4 class="info-title">Third Feature</h4>
                            <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section text-center">
            <h2 class="title">Categorías</h2>

            <form action="{{ url('/search') }}" method="get" class="form-inline">
                <input type="text" placeholder="¿Que producto buscas?" class="form-control" name="query" id="search">
                <button class="btn btn-primary btn-just-icon" type="submit" >
                    <i class="material-icons">search</i>
                </button>
            </form>

            <div class="team">
                <div class="row">
                    @foreach($categories as $category)
                    <div class="col-md-4">
                        <div class="team-player">
                            <img src="{{ $category->featured_image_url }}" alt="Thumbnail Image" class="img-raised img-circle">
                            <h4 class="title"> 
                                <a href="{{ url('categories/'.$category->id) }}">{{ $category->name }} </a>
                                
                            </h4>
                            <p class="description">{{ $category->description }}</p>     
                        </div>
                    </div>
                    @endforeach        
                </div>
               
            </div>

        </div>


        <div class="section landing-section">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="text-center title">Work with us</h2>
                    <h4 class="text-center description">Divide details about your product or agency work into parts. Write a few lines about each one and contact us about any further collaboration. We will responde get back to you in a couple of hours.</h4>
                    <form class="contact-form">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Your Name</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Your Email</label>
                                    <input type="email" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group label-floating">
                            <label class="control-label">Your Messge</label>
                            <textarea class="form-control" rows="4"></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-md-offset-4 text-center">
                                <button class="btn btn-primary btn-raised">
                                    Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

<footer class="footer">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="http://www.creative-tim.com">
                        Creative Tim
                    </a>
                </li>
                <li>
                    <a href="http://presentation.creative-tim.com">
                     About Us
                 </a>
             </li>
             <li>
                <a href="http://blog.creative-tim.com">
                 Blog
             </a>
         </li>
         <li>
            <a href="http://www.creative-tim.com/license">
                Licenses
            </a>
        </li>
    </ul>
</nav>
<div class="copyright pull-right">
    &copy; 2016, made with <i class="fa fa-heart heart"></i> by Creative Tim
</div>
</div>
</footer>
@endsection


@section('scripts')
<script src="{{ asset('/js/typeahead.bundle.min.js') }}"></script> <!--Este se importo de github twitter typeahead-->
<script>
    $(function(){
            //
            var products = new Bloodhound({
              datumTokenizer: Bloodhound.tokenizers.whitespace,
              queryTokenizer: Bloodhound.tokenizers.whitespace,
              // `states` is an array of state names defined in "The Basics"
              prefetch: "{{ url('/products/json') }}"
            });

            $('#search').typeahead({
              hint: true,
              highlight: true,
              minLength: 1
          },
          {
              name: 'products',
              source: products
          });
        });

</script>
@endsection