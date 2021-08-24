<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->

  
    @section('style-libraries')
    <link rel="stylesheet" href="/css/secondary-pages-css.css">
    @endsection
  
</head>

<body>
    @extends('app')
    @section('main')
    <main>
        <div class="about">
            <h1>About CSGO Nades</h1>
            <h2>The story</h2>
            <p>I am Hung Nguyen and I am an avid Counter-Strike player and an IT student. During my matchmaking games, I wanted to be able to find new smokes and teach them to my teammates in a simple way.</p>
            <p>Clone Nades CSGO was created in 2021 to collect a large collection of grenades that can be found with ease. By the way, I want to make a Website, so I find out one to clone: csgonades.com. Thanks to Mellet (founder of csgonades.com), finally I get a way to go. </p>
            <p>With my friends, we regularly rotate in new teammates and it often happens that someone does not know how to throw a nade that we need to execute a strategy for a bomb site. Now, with just a link to the nade, they can learn it in a few seconds between rounds and we can get on with our game.</p>
            <h2>My vision</h2>
            <p>I wanted to make this site useful for both beginners and experienced players.</p>
            <p>If you are new to Counter-Strike, this site can help you learn the basic grenades that every player should know. Try to blind your enemies with an easy pop flash, block off their vision with a nice smoke or set them on fire with a quick molotov.</p>
            <p>Gain an edge over your opponents, teach new grenades to your teammates and watch yourself rise through the ranks. If you are already good at the game, try to coordinate a smoke execute onto a bombsite together with your teammates or invent your strategies with the use of some of the grenades you can find on this website.</p>
        </div>
    </main>
    @endsection
</body>

</html>
<style>


</style>