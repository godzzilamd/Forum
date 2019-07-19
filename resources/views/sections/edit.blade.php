@extends('layouts.app')

@section('css')
    <style>
        .tree, .tree ul {
    margin:0;
    padding:0;
    list-style:none
}
.tree ul {
    margin-left:1em;
    position:relative
}
.tree ul ul {
    margin-left:.5em
}
.tree ul:before {
    content:"";
    display:block;
    width:0;
    position:absolute;
    top:0;
    bottom:0;
    left:0;
    border-left:1px solid
}
.tree li {
    margin:0;
    padding:0 1em;
    line-height:2em;
    color:#369;
    font-weight:700;
    position:relative
}
.tree ul li:before {
    content:"";
    display:block;
    width:10px;
    height:0;
    border-top:1px solid;
    margin-top:-1px;
    position:absolute;
    top:1em;
    left:0
}
.tree ul li:last-child:before {
    background:#fff;
    height:auto;
    top:1em;
    bottom:0
}
.indicator {
    margin-right:5px;
}
.tree li a {
    text-decoration: none;
    color:#369;
}
.tree li button, .tree li button:active, .tree li button:focus {
    text-decoration: none;
    color:#369;
    border:none;
    background:transparent;
    margin:0px 0px 0px 0px;
    padding:0px 0px 0px 0px;
    outline: 0;
}
    </style>
@endsection

@section('content')
    <div class="container mt-4 bg-light rounded">
        <div class="container">
            {!! Form::open(['action' => ['SectionController@update', $section->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                <div class="dropdown show">
                    <a class="btn btn-warning dropdown-toggle mt-3" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Category and Sections
                    </a>
                    
                    <div class="dropdown-menu w-25" aria-labelledby="dropdownMenuLink" style="max-height: 500; overflow: auto;">
                        @foreach ($categories as $category)
                            @if ($category->title == $section->category->title)
                                <a class="dropdown-item" href="javascript:void(0);">
                                    <div class="bg-success rounded mt-2 py-1 pl-1">{{ $category->title }}
                                    </div>
                                </a>
                            @else
                                <a class="dropdown-item" href="javascript:void(0);">{{ $category->title }}</a>
                            @endif
                            @if (count($category->sections) > 0)
                                @foreach ($category->sections as $this_section)
                                    @if ($this_section->id == $section->id)
                                        <a class="dropdown-item pl-5" href="javascript:void(0);">
                                            <div class="bg-success rounded mt-2 py-1 pl-1">{{ $this_section->title }}
                                            </div>
                                        </a>
                                    @else
                                        <a class="dropdown-item pl-5" href="javascript:void(0);">{{ $this_section->title }}</a>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            {{Form::label('title', 'Title', ['class' => 'mt-2'])}}
            {{Form::text('title', $section->title, ['class' => 'form-control'])}}
        </div>
        <div class="py-3">
            <div align='center'>
                {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>    
        </div>
    </div>
@endsection

<script>
    $.fn.extend({
    treed: function (o) {
      
      var openedClass = 'glyphicon-minus-sign';
      var closedClass = 'glyphicon-plus-sign';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };
      
        /* initialize each of the top levels */
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this);
            branch.prepend("");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        /* fire event from the dynamically added icon */
        tree.find('.branch .indicator').each(function(){
            $(this).on('click', function () {
                $(this).closest('li').click();
            });
        });
        /* fire event to open branch if the li contains an anchor instead of text */
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        /* fire event to open branch if the li contains a button instead of text */
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});
/* Initialization of treeviews */
$('#tree1').treed();
</script>