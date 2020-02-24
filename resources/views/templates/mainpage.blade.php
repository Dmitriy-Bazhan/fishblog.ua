@extends('common.loyout')

@section('mainpage')

    <div id="div_with_fish">

        <div id="carouselExampleControls" class="carousel slide my_carousel" >
            <div class="carousel-inner">

                <div class="carousel-item active">
                    @foreach($mainPageParam as $value)
                        <p class="errors_letters">{{ $value['id'] }}</p>
                        <p class="errors_letters">{{ $value['name_fish'] }}</p>
                        <p class="errors_letters">{{ $value['description'] }}</p>
                        <p class="errors_letters">{{ $value['foto_fish'] }}</p>
                        {{--   data-ride="carousel"         <img src="..." class="d-block w-100" alt="...">--}}
                        @unset($mainPageParam[0])
                        @break
                    @endforeach
                </div>


                @foreach($mainPageParam as $value)
                    <div class="carousel-item">
                        <p class="errors_letters">{{ $value['id'] }}</p>
                        <p class="errors_letters">{{ $value['name_fish'] }}</p>
                        <p class="errors_letters">{{ $value['description'] }}</p>
                        <p class="errors_letters">{{ $value['foto_fish'] }}</p>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

@endsection()


