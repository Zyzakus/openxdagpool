@extends('layouts.admin')

@section('title')
	Pool state
@endsection

@section('hero')
	<section class="hero is-primary">
		<div class="hero-body">
			<div class="container">
				<h1 class="title">
					Pool information
				</h1>
				<h2 class="subtitle">
					View pool version, state, stats, miners and various other information
				</h2>
			</div>
		</div>
	</section>
@endsection

@section('adminContent')
	<nav class="card">
		<header class="card-header">
			<p class="card-header-title">
				Pool version, state, stats, config, connections and miners
			</p>
		</header>

		<div class="card-content">
			<p>
				@if (!$state_normal)
					Pool information and state <strong>(abnormal)</strong>:
				@else
					Pool information and state:
				@endif
<pre>{{ $livedata }}</pre>
			</p>
			<p>
				Miners: <br>
<pre>{{ $fastdata }}</pre>
			</p>
		</div>
	</nav>
@endsection
