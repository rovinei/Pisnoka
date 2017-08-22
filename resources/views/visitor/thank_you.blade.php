@extends('visitor.layouts.main')

@section('page_title', 'PISNOKA CONSTRUCTION co,ltd | Thank you page')

@section('content')
<section class="whitebg">
    <div class="page-bg__wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel" style="padding: 60px 0 40px 0;">
                        <h1 class="text-large text-center">
                            @if(Session::has('mail_success')){{ Session::get('mail_success') }}@endif
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
