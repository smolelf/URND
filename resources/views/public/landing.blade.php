<h1> Welcome Back, {{$ses['name']}} </h1>
<style>
    tr th, td{
        padding: 10px;
        background-color: rgba(253, 150, 150, 0.644);
    }
</style>
@if ($ses['usertype'] == 0)
    @include('public.landings.project')
@else
    @include('public.landings.admin')
@endif