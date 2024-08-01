<style>
  .header-top {
padding: 5px 0;
border-bottom: 1px solid #f1f1f1;
/*-- Header Top Two --*/
/*-- Header Top Three --*/
}
.header-top.header-top-2 {
background-color: #224893;
border-bottom: none;
}
@media only screen and (max-width: 479px) {
.header-top-links {
  min-width: 100%;
  text-align: center;
}
}
.header-top-links .header-links {
display: block;
float: left;
/*-- Header Links Two --*/
/*-- Header Links Three --*/
}
@media only screen and (max-width: 479px) {
.header-top-links .header-links {
  display: inline-block;
  float: none;
  vertical-align: top;
}
}
.header-top-links .header-links li {
display: block;
float: left;
padding-right: 11px;
margin-right: 10px;
margin-top: 5px;
margin-bottom: 5px;
position: relative;
/*-- Disabled Link --*/
}
.header-top-links .header-links li::before {
position: absolute;
right: 0;
content: "";
width: 1px;
background-color: #e5e5e5;
height: 12px;
top: 4px;
}
.header-top-links .header-links li:last-child {
margin-right: 0;
padding-right: 0;
}
.header-top-links .header-links li:last-child::before {
display: none;
}
.header-top-links .header-links li a {
display: block;
line-height: 20px;
color: #444444;
font-size: 11px;
text-transform: capitalize;
/*-- Weather --*/
}
.header-top-links .header-links li a .weather-degrees {
position: relative;
padding-right: 5px;
margin-right: 5px;
}
.header-top-links .header-links li a .weather-degrees .unit {
position: absolute;
font-size: 8px;
right: 0;
top: 0;
line-height: 9px;
}
.header-top-links .header-links li a:hover {
color: #224893;
}
.header-top-links .header-links li a i {
display: block;
float: left;
margin-right: 5px;
font-size: 12px;
line-height: 20px;
}
.header-top-links .header-links li.disabled::before {
display: none;
}
.header-top-links .header-links li.disabled a {
cursor: auto;
pointer-events: none;
padding: 10px 20px;
background-color: #173d86;
color: #ffffff;
margin-top: -10px;
margin-bottom: -10px;
}
.header-top-links .header-links li.disabled a:hover {
color: #ffffff;
}
.header-top-links .header-links.header-links-2 li a {
color: #ffffff;
}
.header-top-links .header-links.header-links-2 li a:hover {
color: #444444;
}
.header-top-links .header-links.header-links-2 li.disabled a {
padding: 0;
background-color: transparent;
color: #ffffff;
margin-top: 0;
margin-bottom: 0;
}
.header-top-links .header-links.header-links-2 li.disabled a:hover {
color: #ffffff;
}
.header-top-links .header-links.header-links-3 li a:hover {
color: #de292d;
}
.header-top-links .header-links.header-links-3 li.disabled a {
padding: 0;
background-color: transparent;
color: #444444;
margin-top: 0;
margin-bottom: 0;
}
.header-top-links .header-links.header-links-3 li.disabled a:hover {
color: #de292d;
}

@media only screen and (max-width: 479px) {
.header-top-social {
  min-width: 100%;
  text-align: center;
}
}
.header-top-social .header-social {
display: block;
float: right;
/*-- Header Social Two --*/
/*-- Header Social Three --*/
}
@media only screen and (max-width: 479px) {
.header-top-social .header-social {
  display: inline-block;
  float: none;
  vertical-align: top;
}
}
.header-top-social .header-social a {
display: block;
float: left;
margin-left: 15px;
color: #444444;
}
.header-top-social .header-social a:first-child {
margin-left: 0;
}
.header-top-social .header-social a:hover {
color: #224893;
}
.header-top-social .header-social a i {
font-size: 16px;
display: block;
line-height: 30px;
}
.header-top-social .header-social.header-social-2 a {
color: #ffffff;
}
.header-top-social .header-social.header-social-2 a:hover {
color: #444444;
}
.header-top-social .header-social.header-social-3 a:hover {
color: #de292d;
}

/*----
  Header Section
------------------------------------------*/
.header-section {
padding: 0;
}

.header-logo .logo {
display: block;
float: left;
}
.header-logo .logo img {
max-width: 100%;
height:90px;
}

/*-- Header Banner --*/
.header-banner {
    padding: 5px 0;
}
.header-banner .banner {
float: right;
}
.header-banner .banner a {
display: block;
}
.header-banner .banner a img {
max-width: 100%;

width: 728px;
height: 90px;
}

</style>
{{-- <div class="logo-wrapper flex flex-col md:flex-row items-center lg:space-x-2 my-2">
  <div class="lg:w-3/12 w-full">
      <a href="/" class="block"> <img src="/images/tt_logo.png" class="w-56 lg:w-full mx-auto max-w-full md:max-w-none h-23" alt="Logo"> </a>
  </div>
  <div class="lg:w-9/12">
      @if(!empty($ads['logo-top-right-full']))
          @foreach($ads['logo-top-right-full'] as $ad)
              <a href="{{ $ad->url }}" target="_blank" class="block" title="{{ $ad->name }}">
                  <img class="" src="{{ asset("storage/advertisements/{$ad->image}") }}" alt="{{ $ad->name }}">
              </a>
          @endforeach
      @else

      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9191323709031905"
   crossorigin="anonymous"></script>
<!-- Top_TT_main_header -->
<ins class="adsbygoogle"
   style="display:inline-block;width:728px;height:90px"
   data-ad-client="ca-pub-9191323709031905"
   data-ad-slot="7567223856"></ins>
<script>
   (adsbygoogle = window.adsbygoogle || []).push({});
</script>

      @endif
  </div>
</div> --}}
{{-- new design  --}}
<div class="header-section section">
  <div class="container mx-auto">
      <div class="flex items-center justify-between">
         
          <!-- Header Logo -->
          <div class="header-logo  hidden md:block md:w-5/12">
              <a href="index.php" class="block"><img src="/images/logo.png" class="max-w-full h-20" alt="Telugu Times News"></a>
          </div>
          
          <!-- Header Banner -->
          <div class="header-banner w-full md:w-9/12">
              <div class="banner"> 
                  @if(!empty($ads['logo-top-right-full']))
                  @foreach($ads['logo-top-right-full'] as $ad)
                  <a href="{{ $ad->url }}" target="_blank" class="block" title="{{ $ad->name }}">
                      <img src="{{ asset("storage/advertisements/{$ad->image}") }}" alt="{{ $ad->name }}">
                  </a>
                  @endforeach
      <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-9191323709031905"
      crossorigin="anonymous"></script>
      @else
 <!-- Top_TT_main_header -->
 <ins class="adsbygoogle"
      style="display:inline-block;width:728px;height:90px"
      data-ad-client="ca-pub-9191323709031905"
      data-ad-slot="7567223856"></ins>
 <script>
      (adsbygoogle = window.adsbygoogle || []).push({});
 </script>
 
         @endif
              </div>
          </div>
          
      </div>
  </div>
</div>