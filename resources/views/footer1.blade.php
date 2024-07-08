<footer class="pt-4 bg-blue-600 mt-4">
    <div class="lg:w-9/12 mx-auto px-4 lg:px-8 text-white space-y-8 leading-loose text-sm">
        <div class="flex items-center">
            <div class="flex-item space-y-2 hidden lg:block lg:w-4/12" id="footerForm">
                <div class="w-11/12">
                    <label for="epaperSubscribe" class="font-bold text-lg text-white">Subscribe to E-Paper</label>
                    <form action="" class="flex" method="post" @submit.prevent="addSubscriber">
                        <input type="email" required @keyup="validateEmail" v-model="email" :readonly="stopSubmit" id="epaperSubscribe" class="border-0 text-gray-700 flex-1 placeholder-grey-400" placeholder="Enter your email"/>
<!--                        <svg class="w-7 border-r-2 bg-white text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>-->
                    </form>
                    <div :class="[(type == 'warning') ? 'text-red-500' : 'text-green-500']" v-if="subscriber_message != ''" v-text="subscriber_message" v-cloak></div>
                </div>
            </div>
            <div class="flex-item w-full lg:w-4/12">
                <x-auth.application-logo :white="true"/>
            </div>
            <div class="hidden flex-item lg:block lg:w-4/12 text-center">
                <a href="{{ route('advertise') }}" class="text-lg text-white font-bold">Advertise with Us</a>
            </div>
        </div>
        <p class="text-xs text-justify">
            'Telugu Times' is the First Global Telugu Newspaper started in July 2003 by a team of experienced
            Professionals in the Media, Business in India and abroad. Telugu Times is truly global as its pages are
            prepared in Hyderabad office, transmitted directly to the Press in USA, printed in San Francisco and
            distributed throughout USA.North America has over 4 Million Indian Communities and all major language groups
            have their own newspapers in their own language like Malayalees have Malayali publication, Gujarathis have
            Gujarari publications, Punjabis have Pubjabhi publication, where as Telugu community in USA, being the
            Second largest and fastest growing Indian ethnic community residing in USA, did not have any news
            publication in telugu. Thus Telugu Times was started to meet the media requirements of around 10,00,000 Non
            Resident Telugu community in North America. </p>
        <div class="flex justify-start flex-wrap">
            <div class="w-1/2 lg:w-1/4">
                <ul class="footer-menu justify-content-between">
                    <li><a href="{{ route("categoryNews","realestate") }}">Real Estate</a></li>
                    <li><a href="{{ route("categoryNews","covid19") }}">COVID19 News</a></li>
                    <li><a href="{{ route("categoryNews","business") }}">Business News </a></li>
                    <li><a href="{{ route("categoryNews","events") }}">Events</a></li>
                    <li><a href="{{ route("categoryNews","epaper") }}">e-Paper</a></li>
                    <li><a href="{{ route("news-folders") }}">News Folders </a></li>
                    <li><a href="{{ route("videos") }}">Videos </a></li>
                </ul>
            </div>
            <div class="w-1/2 lg:w-1/4">
                <ul class="footer-menu justify-content-between">
                    <li><a href="{{ route("categoryNews","usa-nri-news") }}">USA NRI News </a></li>
                    <li><a href="{{ route("categoryNews","shopping") }}">Shopping</a></li>
                    <li><a href="{{ route("categoryNews","bayarea") }}">Bay Area News</a></li>
                    <li><a href="{{ route("categoryNews","dallas") }}">Dallas News</a></li>
                    <li><a href="{{ route("categoryNews","newjersey") }}">New Jersey News</a></li>
                    <li><a href="{{ route("categoryNews","washingtondc") }}">Washington DC News</a></li>
                    <li><a href="{{ route("categoryNews","newyork") }}">New York News </a></li>
                </ul>
            </div>
            <div class="w-1/2 lg:w-1/4 mt-4 md:mt-0">
                <ul class="footer-menu justify-content-between">
                    <li><a href="{{ route("categoryNews","politics") }}">Political News</a></li>
                    <li><a href="{{ route("categoryNews","usapolitics") }}">USA Politics</a></li>
                    <li><a href="{{ route("categoryNews","national") }}">National Politics </a></li>
                    <li><a href="{{ route("categoryNews","navyandhra") }}">Navyandhra News</a></li>
                    <li><a href="{{ route("categoryNews","telangana") }}">Telangana News</a></li>
                    <li><a href="{{ route("categoryNews","international") }}">International Politics </a></li>
                    <li><a href="{{ route("categoryNews","interviews") }}">Interviews </a></li>
                    <li><a href="{{ route("categoryNews","articles") }}">Articles </a></li>
                </ul>
            </div>
            <div class="w-1/2 lg:w-1/4 mt-4 md:mt-0">
                <ul class="footer-menu justify-content-between">
                    <li><a href="{{ route("advertise") }}">Advertise with Telugutimes </a></li>
                    <li><a href="{{ route("about-us") }}">Why Telugutimes ? </a></li>
                    <li><a href="{{ route("contact-us") }}">Contact Us </a></li>
                    <li><a href="{{ route("epaper") }}">Fort-Nightly</a></li>
                    <li><a href="{{ route("categoryNews","cinemas") }}">Cinema News</a></li>
                    <li><a href="{{ route("gallery.category","cinema") }}">Cinema Gallery</a></li>
                    <li><a href="{{ route("gallery.category","america") }}">USA Community Gallery</a></li>
                </ul>
            </div>
        </div>
    </div>
    <p class="text-center mt-3 py-3 text-white bg-blue-700">
        Copyright &copy;
        <script> document.write(new Date().getFullYear()); </script>
        All rights reserved | Telugutimes
    </p>
</footer>

{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

            
            
            <!-- Footer Widget End -->
            
           
            
            
            
           
            
        </div>
    </div>
</div>
        </div>
    </div>
</div><!-- Footer Top Section End -->

<!-- Footer Bottom Section Start -->
<div class="section">
    <div class="container footer-bottom-section bg-dark">
        <div class="row">
            
            <!-- Copyright Start -->
            <div class="copyright col12">
               <p class="text-left text-white bg-blue-700">
    Copyright ©
    <script> document.write(new Date().getFullYear()); </script>
    All rights reserved | Telugutimes
</p>

{{-- <p  class="text-right text-white bg-blue-700">Powered By: <a href="https://www.bitra.com/" target="_blank" title="Website Designed By BitraNet Pvt Ltd.,">BITRA</a> &amp; <a href="https://www.bitragroup.com/" target="_blank" title="Website Developed By BitraTech (OPC) Pvt. Ltd.,">BITRA GROUP</a></p> --}}
            </div><!-- Copyright End -->
            
        </div>
    </div>
</div>
<button onclick="topFunction()" id="scrollToTop" class="hidden bottom-4 fixed w-12 h-12 right-4 btn primary" title="Go to top">
    <svg class="w-6 h-6 animate-bounce m-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18"></path>
    </svg>
</button>
<script src="{{ asset("js/back-top.js") }}"></script>
