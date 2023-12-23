<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<script>
    let mybutton = document.getElementById("myBtn");

    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }

    function topFunction() {
        // Get current vertical position
        let currentPosition = document.documentElement.scrollTop || document.body.scrollTop;

        // Calculate the scroll amount per frame
        const scrollStep = 10 ; // Change '500' to adjust speed, lower value = faster

        // Function to perform scrolling
        const scrollInterval = setInterval(function() {
            if (document.documentElement.scrollTop !== 0) {
                // Scroll up by a small step
                window.scrollBy(0, -scrollStep);
            } else {
                clearInterval(scrollInterval); // Stop scrolling when at the top
            }
        }, 0); // 15ms interval - can be adjusted for smoother animation
    }
</script>
