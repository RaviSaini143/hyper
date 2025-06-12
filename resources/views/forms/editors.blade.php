@extends('layouts.detached', ['title' => 'Editors'])

@section('css')
    <!-- Quill css -->
    @vite([
        'node_modules/quill/dist/quill.core.css',
        'node_modules/quill/dist/quill.snow.css',
        'node_modules/quill/dist/quill.bubble.css',
        'node_modules/simplemde/dist/simplemde.min.css',
        ])
@endsection

@section('content')
    @include('layouts.shared/page-title', ['sub_title' => 'Forms', 'page_title' => 'Editors'])

    <div class="row">
        <div class="col-12">
            <div class="card">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="mb-2">
                            <h4 class="header-title mt-2">Quill Editor</h4>
                            <p class="text-muted font-14">Snow is a clean, flat toolbar theme.</p>

                            <ul class="nav nav-tabs nav-bordered mb-3">
                                <li class="nav-item">
                                    <a href="#hint-emoji-preview" data-bs-toggle="tab" aria-expanded="false"
                                       class="nav-link active">
                                        Preview
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#hint-emoji-code" data-bs-toggle="tab" aria-expanded="true"
                                       class="nav-link">
                                        Code
                                    </a>
                                </li>
                            </ul> <!-- end nav-->
                            <div class="tab-content">
                                <div class="tab-pane show active" id="hint-emoji-preview">
                                    <div id="snow-editor" style="height: 300px;">
                                        <h3><span class="ql-size-large">Hello World!</span></h3>
                                        <p><br></p>
                                        <h3>This is an simple editable area.</h3>
                                        <p><br></p>
                                        <ul>
                                            <li>
                                                Select a text to reveal the toolbar.
                                            </li>
                                            <li>
                                                Edit rich document on-the-fly, so elastic!
                                            </li>
                                        </ul>
                                        <p><br></p>
                                        <p>
                                            End of simple area
                                        </p>
                                    </div><!-- end Snow-editor-->
                                </div> <!-- end preview-->

                                <div class="tab-pane code" id="hint-emoji-code">
                                    <p class="m-2">Please include following css file at <code>head</code> element</p>
                                    <button class="btn-copy-clipboard" data-clipboard-action="copy">Copy</button>
                                    <pre class="mb-0">
                                    <span class="html escape">

                                        &lt;!-- HTML --&gt;
                                        &lt;div id=&quot;snow-editor&quot; style=&quot;height: 300px;&quot;&gt;
                                            &lt;h3&gt;&lt;span class=&quot;ql-size-large&quot;&gt;Hello World!&lt;/span&gt;&lt;/h3&gt;
                                            &lt;p&gt;&lt;br&gt;&lt;/p&gt;
                                            &lt;h3&gt;This is an simple editable area.&lt;/h3&gt;
                                            &lt;p&gt;&lt;br&gt;&lt;/p&gt;
                                            &lt;ul&gt;
                                                &lt;li&gt;
                                                    Select a text to reveal the toolbar.
                                                &lt;/li&gt;
                                                &lt;li&gt;
                                                    Edit rich document on-the-fly, so elastic!
                                                &lt;/li&gt;
                                            &lt;/ul&gt;
                                            &lt;p&gt;&lt;br&gt;&lt;/p&gt;
                                            &lt;p&gt;
                                                End of simple area
                                            &lt;/p&gt;
                                        &lt;/div&gt;
                                    </span>
                                </pre> <!-- end highlight-->
                                </div> <!-- end preview code-->
                            </div> <!-- end tab-content-->

                        </div>
                    </li>

                    <li class="list-group-item">
                        <div class="mb-2">
                            <h5 class="mb-1">Bubble Editor</h5>
                            <p class="text-muted font-14">Bubble is a simple tooltip based theme.</p>

                            <ul class="nav nav-tabs nav-bordered mb-3">
                                <li class="nav-item">
                                    <a href="#hint-mentions-preview" data-bs-toggle="tab" aria-expanded="false"
                                       class="nav-link active">
                                        Preview
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#hint-mentions-code" data-bs-toggle="tab" aria-expanded="true"
                                       class="nav-link">
                                        Code
                                    </a>
                                </li>
                            </ul> <!-- end nav-->
                            <div class="tab-content">
                                <div class="tab-pane show active" id="hint-mentions-preview">
                                    <div id="bubble-editor" style="height: 300px;">
                                        <h3><span class="ql-size-large">Hello World!</span></h3>
                                        <p><br></p>
                                        <h3>This is an simple editable area.</h3>
                                        <p><br></p>
                                        <ul>
                                            <li>
                                                Select a text to reveal the toolbar.
                                            </li>
                                            <li>
                                                Edit rich document on-the-fly, so elastic!
                                            </li>
                                        </ul>
                                        <p><br></p>
                                        <p>
                                            End of simple area
                                        </p>
                                    </div> <!-- end Snow-editor-->
                                </div> <!-- end preview-->

                                <div class="tab-pane code" id="hint-mentions-code">
                                    <p class="m-2">Please include following css file at <code>head</code> element</p>
                                    <button class="btn-copy-clipboard" data-clipboard-action="copy">Copy</button>
                                    <pre class="mb-0">
                                    <span class="html escape">

                                        &lt;div id=&quot;bubble-editor&quot; style=&quot;height: 300px;&quot;&gt;
                                            &lt;h3&gt;&lt;span class=&quot;ql-size-large&quot;&gt;Hello World!&lt;/span&gt;&lt;/h3&gt;
                                            &lt;p&gt;&lt;br&gt;&lt;/p&gt;
                                            &lt;h3&gt;This is an simple editable area.&lt;/h3&gt;
                                            &lt;p&gt;&lt;br&gt;&lt;/p&gt;
                                            &lt;ul&gt;
                                                &lt;li&gt;
                                                    Select a text to reveal the toolbar.
                                                &lt;/li&gt;
                                                &lt;li&gt;
                                                    Edit rich document on-the-fly, so elastic!
                                                &lt;/li&gt;
                                            &lt;/ul&gt;
                                            &lt;p&gt;&lt;br&gt;&lt;/p&gt;
                                            &lt;p&gt;
                                                End of simple area
                                            &lt;/p&gt;
                                        &lt;/div&gt;
                                    </span>
                                </pre> <!-- end highlight-->
                                </div> <!-- end preview code-->
                            </div> <!-- end tab-content-->

                        </div>
                    </li>
                </ul> <!-- end list-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">SimpleMDE</h4>
                    <p class="text-muted font-14">SimpleMDE is a light-weight, simple, embeddable, and beautiful JS
                        markdown
                        editor</p>

                    <ul class="nav nav-tabs nav-bordered mb-3">
                        <li class="nav-item">
                            <a href="#simplemde-preview" data-bs-toggle="tab" aria-expanded="false"
                               class="nav-link active">
                                Preview
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#simplemde-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
                                Code
                            </a>
                        </li>
                    </ul> <!-- end nav-->
                    <div class="tab-content">
                        <div class="tab-pane show active" id="simplemde-preview">
                            <textarea id="simplemde1"></textarea>
                        </div> <!-- end preview-->

                        <div class="tab-pane code" id="simplemde-code">
                            <p class="m-2">Please include following css file at <code>head</code> element</p>
                            <button class="btn-copy-clipboard" data-clipboard-action="copy">Copy</button>
                            <pre class="mb-0">
                            <span class="html escape">


                                &lt;!-- HTML --&gt;
                                &lt;textarea id=&quot;simplemde1&quot;&gt;&lt;/textarea&gt;
                            </span>
                        </pre> <!-- end highlight-->
                        </div> <!-- end preview code-->
                    </div> <!-- end tab-content-->

                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div>
    <!-- end row -->
@endsection


@section('script')
    @vite([
        'resources/js/pages/demo.quilljs.js',
        'resources/js/pages/demo.simplemde.js',
        'resources/js/hyper-syntax.js'
        ])
@endsection
