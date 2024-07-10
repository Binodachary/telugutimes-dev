<footer class="lg:w-8/12 pt-4 bg-dark mt-4 mx-auto">
    <div class="lg:w-full mx-auto px-6 lg:px-6 text-white space-y-8 leading-loose text-sm">
        <div class="flex flex-col lg:flex-row items-center">
            <div class="lg:block lg:w-4/12 mb-10 text-center">
                <a href="{{ route('advertise') }}" class="text-lg text-white font-bold">Advertise with Us</a>
            </div>
            <div class="w-4/12 mb-10 flex justify-center">
                <x-auth.application-logo :white="true" />
            </div>
            <div class="space-y-2  lg:block lg:w-4/12 mb-10" id="footerForm">
                <div class="w-full text-center">
                    <label for="epaperSubscribe" class="font-bold text-lg text-white">Subscribe to <span class="highlight-menu-item">E-Paper</span></label>
                    <form action="" class="flex lg:block" method="post" @submit.prevent="addSubscriber">
                        <input type="email" style="padding: 4px;margin:0px 5px 3px 0px" required @keyup="validateEmail" v-model="email" :readonly="stopSubmit" id="epaperSubscribe" class="lg:w-full border-0 text-gray-700 flex-1 placeholder-grey-400" placeholder="Enter your email" />
                        <button type="submit" name="subscribe" class="btn danger mx-auto" style="padding:0px 10px;">submit</button>
                    </form>
                    <div :class="[(type == 'warning') ? 'text-red-500' : 'text-green-500']" v-if="subscriber_message != ''" v-text="subscriber_message" v-cloak></div>
                </div>
            </div>
        </div>
        
        <h4 class="widget-title">About Us</h4>
        <p class="text-justify" style="margin-top: 0px;">
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
            <div class="w-full lg:w-1/4 md:w-6/12">
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
            <div class="w-full lg:w-1/4 md:w-6/12">
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
            <div class="w-full lg:w-1/4 md:w-6/12 mt-4 md:mt-0">
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
            <div class="w-full lg:w-1/4 md:w-6/12 mt-4 md:mt-0">
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
        <div class="flex" style="justify-content: space-between;">
            <p class="text-center mt-3 py-3 text-white bg-dark">
                COPYRIGHT &copy;
                <script>
                    document.write(new Date().getFullYear());
                </script>
                ALL RIGHTS RESERVED | TELUGUTIMES
            </p>
            <p class="text-center  mt-3 py-3  text-white bg-dark">Powered By: <a href="https://www.bitra.com/" target="_blank" title="Website Designed By BitraNet Pvt Ltd.,">BITRA</a> &amp; <a href="https://www.bitragroup.com/" target="_blank" title="Website Developed By BitraTech (OPC) Pvt. Ltd.,">BITRA GROUP</a></p>
        </div>
    </div>
</footer>
<button onclick="topFunction()" id="scrollToTop" class="hidden bottom-4 fixed w-12 h-12 right-4 btn primary" title="Go to top">
    <svg class="w-6 h-6 animate-bounce m-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18"></path>
    </svg>
</button>
<script src="{{ asset("js/back-top.js") }}"></script>