<div class="row"  x-data="{show : true}">
    <div class="col">
        <form method="get" action="{{ url('blogs') }}" @click.away="show = false">
            <div class="input-group">
                <input x-on:click="show = true" wire:model.debounce.250ms="query" value="{{ Request::query(" query") }}" name="query"
                    class="form-control form-control-lg" type="text"
                    placeholder="Search here !"
                    style="border-color: rgb(234,234,234);border-bottom-color: rgb(197, 197, 197);">
                <div wire:loading>
                    <span class="input-group-text" id="basic-addon2" style="background-color: white; border:0px;">
                        <div class="spinner-border ms-auto" role="status" aria-hidden="true"></div>
                    </span>
                </div>
            </div>
            @if($blogs !== null)
                <div class="search-result p-4"
                    x-show="show"
                    style="max-height: 40vh; overflow-x: scroll; background-color: #0a0231; color: white; border-radius: 0px 0px 15px 15px;">
                    @foreach($blogs as $blog)
                        <div class="float-end"><b>{{$blog->readingTime()}}</b></div>
                        <h6><a style="color: white;" href="{{ url('b/'.$blog->slug) }}">{{$blog->title}}</a> by <a style="color: white;" href="{{ url('user/'.$blog->writer.'/'.$blog->user->id) }}">{{$blog->writer}}</a>
                        </h6>
                        <small style="color: #949494">{{ substr($blog->content, 0, 350) }}...</small>
                        @if(! $loop->last)
                            <hr />
                        @endif
                        
                    @endforeach
                </div>
            @endif
        </form>
    </div>
</div>