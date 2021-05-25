@if(session("success"))

<div class="alert alert-success">
    <h1>
        {{session("success")}}
    </h1>
</div>
@endif