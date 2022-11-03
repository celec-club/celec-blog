<div class="col-sm-12 col-md-12 p-3 mt-3 profile-card" style="border-radius: 10px; color: white;">
    <center>
        <div class="user-icon text-center" style="width: 70px;">
            {!! $user->icon !!}
        </div>
        <a href="{{ url('user/'.$user->name.'/'.$user->id) }}" style="color:white; text-decoration: underline;">
            {{$user->name}}
        </a>
        <br />
        <span class="mt-2">
            <i>
                {{$user->description}}
            </i>
            <br />
            <small>{{$user->blogs->count()}} articles | Joined at: {{$user->created_at->format("Y-m-d")}}</small>
        </span>
        <br />
        <hr />
        <a href="{{ url('user/'.$user->name.'/'.$user->id) }}" style="color:white; text-decoration: underline;">
            {{$user->email}}
        </a>
    </center>
</div>