@if ($user->id == auth()->user()->id)
    @extends('layouts.app')

    @section('subheader')
        <div class="d-flex bg-white shadow-sm">
            <div class="d-flex col-md-12" id="nav">
                <div class="btn m-1 border border-dark col-md-2 d-flex">
                    <div class="ml-3 mt-1">Profil /</div>
                    <div class="pl-1">@if ($user->avatar) <img src="/storage/user/{{ $user->id . '/50_' . $user->avatar }}" class="img_16"> @endif</div>
                    <div class="ml-2 mt-1">{{ $user->name }}</div>
                </div>
                <div class="d-flex flex-row-reverse col-md-10"> 
                    <div class="btn btn-info m-1 border border-dark mr-3 px-4">
                        <i class="far fa-arrow-alt-circle-right"></i>
                        Last Topic
                    </div>
                    <div class="btn btn-info m-1 border border-dark mr-3 px-4">
                        <i class="fas fa-hourglass-start"></i>
                        Started topics
                    </div>
                    <div class="btn btn-info m-1 border border-dark mr-3 px-4">
                        <i class="far fa-images"></i>
                        Album
                    </div>
                    <div class="btn btn-info m-1 border border-dark mr-3 px-4">
                        <i class="fas fa-address-book"></i>
                        Black list
                    </div>
                    <div class="btn btn-info m-1 border border-dark mr-3 px-4">
                        <i class="far fa-address-book"></i>
                        Friend list
                    </div> 
                    <div class="btn btn-info m-1 border border-dark mr-3 px-4" id="black">
                        <i class="far fa-user"></i>
                        Profil
                    </div>
                    <div class="d-flex  my-1 mr-5">
                        <div>
                            <input type="text" class="pt-2 form-control">
                        </div>
                        <div>
                            <button class="btn btn-primary" id="search">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('content')
        <div class="container py-3 rounded bg-white" id="focus">
            @if ($user->friends)
                @foreach ($user->friends as $friend)
                    <div class="border-roundest d-flex mt-3">
                        <div class="d-flex pt-2 pb-2 col-md-11">
                            <div class="ml-3 mt-3">
                                @if ($friend->isOnline()) 
                                    <img src="/storage/user/on-off2.png" class="mb-1 mr-1">
                                @else 
                                    <img src="/storage/user/on-off1.png" class="mb-1 mr-1">
                                @endif
                            </div>
                            <div class="ml-1">
                                @if ($friend->avatar) <img src="/storage/user/{{ $friend->id . '/50_' . $friend->avatar }}" class='mb-1'> @endif
                            </div>
                            <div class="ml-2 mt-3">
                                {{ $friend->name }}
                            </div>
                        </div>
                        <div class="col-md-1 text-right pt-3">
                            <div class="dropdown">
                                <i class='material-icons btn p-0' data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">settings</i>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            <div class="container" style="width:900px;">
                    <h2 align="center">JSON Live Data Search using Ajax JQuery</h2>
                    <h3 align="center">Employee Data</h3>   
                    <br /><br />
                    <div align="center">
                     <input type="text" name="search" id="search" placeholder="Search Employee Details" class="form-control" />
                    </div>
                    <ul class="list-group" id="result"></ul>
                    <br />
                   </div>
        </div>

        <script>
            $(document).ready(function(){
                $.ajaxSetup({ cache: false });
                $('#search').keyup(function(){
                    $('#result').html('');
                    $('#state').val('');
                    var searchField = $('#search').val();
                    var expression = new RegExp(searchField, "i");
                    $.getJSON('data.json', function(data) {
                        $.each(data, function(key, value){
                            if (value.name.search(expression) != -1 || value.location.search(expression) != -1)
                            {
                            $('#result').append('<li class="list-group-item link-class"><img src="'+value.image+'" height="40" width="40" class="img-thumbnail" /> '+value.name+' | <span class="text-muted">'+value.location+'</span></li>');
                            }
                        });   
                    });
                });
                
                $('#result').on('click', 'li', function() {
                    var click_text = $(this).text().split('|');
                    $('#search').val($.trim(click_text[0]));
                    $("#result").html('');
                });
            });
        </script>
    @endsection
@endif