@extends('layouts.app')

@section('title', 'Support Teleperformance')

@section('content')
<script>
    function FormatMain() {
        const main = document.getElementsByTagName('main')[0]; // Acessa o primeiro elemento <main>
        if (main) {
            main.className = 'bg-black'; // Define a classe
        }
    }

    FormatMain();
</script>
<div class="container" style="height: 100% !important;">
    <div class="row" style="height: 100% !important;">
        <div class="col-md-12" style="height: 100% !important;">
            <div class="row text-white" id="chat-wrapper" data-user-id="{{ Auth::user()->id }}" data-image-path="{{ asset('storage/') }}" data-audio-path="{{ asset('storage/') }}" style="height: 100% !important;">
                <div class="col-md-12" id="chat-body" style="height: 90%; overflow-y: hidden;">
                    <div class="p-3 d-flex flex-column" id="messages-container" style="height: 100%;">
                        <!-- Mensagens serão carregadas aqui -->
                    </div>
                </div>
                <div class="col-md-12 mt-2" id="chat-footer">
                    <form class="d-flex" id="chat-form" enctype="multipart/form-data">
                        @csrf
                        <div class="pe-2 w-100">
                            <textarea class="form-control" name="mesage" id="myTextarea" placeholder="Diga algo..." cols="30" rows="1"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success text-white"><i class="fa-solid fa-play"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

