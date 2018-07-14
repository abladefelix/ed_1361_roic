@extends('layouts.mlm')

@section('content')

<transition name="fade">
	<!-- :key argument makes Vue Router recognize changes to the route and forces the component to be re-created-->
  <router-view transition="fade" transition-mode="out-in" class="animated" :key="$route.fullPath"></router-view>
</transition>

@endsection
