        var max_width = parseInt(getComputedStyle(document.body).getPropertyValue('--max--width'));
        console.log(max_width);
        let set_wight = 0;
        const slider_line = document.querySelector('.slider_line')
        document.querySelector('.slider_next').addEventListener('click', function (){
            set_wight = set_wight + max_width;
            if(set_wight > max_width){
                set_wight = 0;
            }
            slider_line.style.left = -set_wight + 'px';
        })
        document.querySelector('.slider_prev').addEventListener('click', function (){
            set_wight = set_wight - max_width;
            if(set_wight < 0){
                set_wight = max_width;
            }
            slider_line.style.left = -set_wight + 'px';
        })
