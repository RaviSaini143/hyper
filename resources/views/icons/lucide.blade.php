@extends('layouts.detached', ['title' => 'Lucide Icons'])

@section('content')
    @include('layouts.shared/page-title', ['sub_title' => 'Icons', 'page_title' => 'Lucide'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-2">
                        Lucide Icons
                        <a href="https://lucide.dev/" target="_blank" class="ms-2 d-inline-flex align-items-center">
                            <span class="badge bg-primary align-middle">Docs <i class="mdi mdi-link font-12"></i></span>
                        </a>
                    </h4>

                    <p class="card-title-desc mb-2">Use <code>&lt;i data-lucide="accessibility"&gt;&lt;/i&gt;</code></p>

                    <div class="row row-cols-lg-5 row-cols-md-3 row-cols-1 g-2 font-15 icons-list-demo" id="icons"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <!-- MDI Icons Demo js -->
    @vite(['resources/js/pages/demo.lucideicons.js'])
@endsection
