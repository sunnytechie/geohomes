@extends('layouts.admin')

@section('content')
<div class="mt-5"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 shadow">
            <div class="content">
                <h3>Land Final Paper</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae laboriosam nostrum expedita, at id debitis incidunt, eaque suscipit labore iure enim rem praesentium amet dicta nobis voluptatum sed corporis. Omnis!</p>
            </div>
            <div class="py-4">
                <form action="{{ route('downloadFinalPdf', $transaction->id) }}" method="POST">
                    @csrf
                <button class="btn btn-default" style="background: #00A75A; color: #fff">Download Final Paper</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
