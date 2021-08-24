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
        <article id="blog-article" style="color: #424242; display: grid; grid-column-gap: 16px; grid-row-gap: 16px; grid-template-areas: ' title-img' 'article-detail' ; grid-template-columns: 1fr; grid-template-rows: min-content min-content min-content min-content; margin-top:10px">
            <div class="article-title-img" style="display:grid; grid-area:title-img; height:50vh; border-radius:5px; position:relative;">
                <div style="display:block;overflow:hidden;position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box; margin:0">
                    <img class="post-img" src="../blogs-image/align-crosshair_thumb.jpg" sizes="100vw" style="position:absolute;top:0;left:0;bottom:0;right:0;box-sizing:border-box;padding:0;border:none;margin:auto;display:block;width:0;height:0;min-width:100%;max-width:100%;min-height:100%;max-height:100%;object-fit:cover">
                </div>
                <div class="article-title" style="position: absolute; right: 0; left: 0; bottom: 0; align-items: flex-end;  color: white; display: flex; padding: 0px 20px; z-index: 1;">
                    <h2 style="font-size:28px">Smoke Lineup Crosshair Bind for CS:GO</h2>
                </div>
            </div>
            <section style="grid-area:article-detail;border-radius:8px; border:none; background: rgba(255,255,255,0.5)">
                <h2 class="post-date">March 30, 2020</h2>
                <p>Create a fullscreen crosshair to line up smokes and other nades. For particular smokes, it can be hard to find something natural to place your crosshair at to hit that perfect smoke. This key bind will help you align those hard nades.</p>
                <p>To get the result as shown in the image above you can choose</p>
                <p>Simple bind: No need to edit your config file, but you have to press the button to enable/disable the crosshair.</p>
                <p>Custom bind: When you hold down the button, the crosshair is big. And when you release it, it goes back to normal. But you will have to edit your config file.</p>
                <h2>How to set it up</h2>
                <h3>1. Simple: Toggle Crosshair</h3>
                <p>Open your console and write <code>cl_crosshairsize</code> to get the current crosshair size you are using.</p>
                <div class="console" style="border-radius:8px; background:#a2a2a3; padding-bottom:30px">
                    <h4 style="color:white; padding: 10px 20px">Console</h4>
                    <div style="border:1px solid #363636; background:#3F3D3E; display:flex; flex-direction: column; color:white;margin:-10px 10px -10px 10px; padding:10px; flex:1">
                        <div class="console-content" style="border:1px solid #363636;background:#3F3D3E;margin:5px">
                            <pre>] cl_crosshairsize
"cl_crosshairsize" = "2.5" ( def. 5 )
] bind "X" "toggle cl_crosshairsize 2.5 5000"
bind "X" "toggle cl_crosshairsize 2.5 5000"</pre>
                        </div>
                        <div class="console-input" style="border:1px solid #363636;background:#3F3D3E;margin:5px">2</div>
                    </div>
                </div>
            </section>
        </article>
    </main>
    @endsection
    @section('sidebar')
    <aside>
        <div style="display:flex; flex-direction:column;border-radius:8px; border:1px solid rgba(0,0,0,0.3); margin-top:10px; margin-right:10px">
            <div class="share-title" style="text-align:center; padding: 10px 10px; border-top-left-radius:8px;border-top-right-radius:8px; border-bottom: 1px solid rgb(0,0,0,0.7); background: rgb(245,245,245)">Share</div>
            <div class="share-buttons" style="display: flex; justify-content: space-between; border-bottom-left-radius: 8px; border-bottom-right-radius:8px; background: white; opacity:0.8; padding: 5px 20px">
                <div class="share-button">
                    <button class="reddit-button" style="background:transparent; border:none; padding:0; cursor:pointer; color:black">
                        <i class="fab fa-reddit-square" style="height:40px;width:40px;font-size:20px"></i>
                    </button>
                </div>
                <div>
                    <button class="facebook-button" style="background:transparent; border:none; padding:0; cursor:pointer; color:black">
                        <i class="fab fa-facebook-square" style="height:40px;width:40px;font-size:20px"></i>
                    </button>
                </div>
                <div>
                    <button class="twitter-button" style="background:transparent; border:none; padding:0; cursor:pointer; color:black">
                        <i class="fab fa-twitter-square" style="height:40px;width:40px;font-size:20px"></i>
                    </button>
                </div>
                <div>
                    <button class="reddit-button" style="background:transparent; border:none; padding:0; cursor:pointer; color:black">
                        <i class="fab fa-vk" style="height:40px;width:40px;font-size:20px"></i>
                    </button>
                </div>

            </div>
        </div>

    </aside>
    @endsection

</body>

</html>
<style>
    body {
        background-color: #ededed;
        display: block;
        overflow-x: auto;
        font-weight: 300;
        font-size: 16px;
        font-family: Roboto, Helvetica, sans-serif !important;
        box-sizing: border-box;
        min-width: 320px;
    }

    #page {
        display: grid;
        width: 100%;
        height: 100%;
        grid-template-columns: 190px 2fr 1fr;
        grid-template-rows: 50px min-content 1fr 1fr;
        grid-gap: 16px;
        grid-template-areas:
            "header header header"
            "nav main sidebar"
            "nav main sidebar"
            "nav main sidebar";
    }

    section:nth-child(odd),
    section:nth-child(even) {
        padding: 10px;
    }

    pre {
        padding-left: 10px;
        color: white;
    }
</style>