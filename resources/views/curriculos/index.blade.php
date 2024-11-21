@extends('layouts.master')

@section('content')

<div class="row">

    @for ($i=0; $i<count($arrayCurriculos); $i++)

    <div class="col-4 col-md-6 col-12-small">
        <section class="box">
            <a href="#" class="image featured" title="SleaY, CC BY 4.0 &lt;https://creativecommons.org/licenses/by/4.0&gt;, via Wikimedia Commons"><img width="256" alt="Curriculum-vitae-warning-icon" src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png"></a>
            <header>
                <h3>Usuario {{ $arrayCurriculos[$i]['user_id'] }}</h3>
            </header>
            <p>
                <strong>Video Curriculum:</strong> <a href="{{ $arrayCurriculos[$i]['video_curriculum'] }}">{{ $arrayCurriculos[$i]['video_curriculum'] }}</a>
            </p>
            <p>
                <strong>Texto Curriculum:</strong> {{ $arrayCurriculos[$i]['texto_curriculum'] }}
            </p>
            <footer>
                <ul class="actions">
                    <li><a href="{{ action([App\Http\Controllers\CurriculoController::class, 'getShow'], ['id' => $i] ) }}" class="button alt">Más info</a></li>
                </ul>
            </footer>
        </section>
    </div>

    @endfor

</div>
@endsection
