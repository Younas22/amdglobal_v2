@extends('common.layout')
@section('content')

<div class="flight-container">

    <div class="page-header">
        <h1><?= $page->name; ?></h1>
        <p>Last Updated: <?= date('F j, Y', strtotime($page->updated_at)); ?></p>
    </div>

    <div class="content-grid contact-info">
        <!-- <h2 class="section-title">Our Mission</h2> -->
        <p class="content-text">
           <?= $page->content; ?>
        </p>
    </div>

</div>

@endsection
