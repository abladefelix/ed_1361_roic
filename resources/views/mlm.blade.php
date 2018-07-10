@extends('layouts.mlm')

@section('content')

<transition name="fade">
  <router-view transition="fade" transition-mode="out-in" class="animated"></router-view>
</transition>

@endsection
