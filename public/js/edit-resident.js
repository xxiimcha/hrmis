let result  = document.querySelector('.result');
let upload  = document.querySelector('#file-input');
let done    = document.querySelector('#done_adjust');
let container = document.querySelector('#second-stepper');
let image   = container.getElementsByTagName('img').item(0);
let cropper = '';

cropper = new Cropper(image, {
    aspectRatio: 1,
    viewMode: 1,
    minCropBoxWidth: 200,
    minCropBoxHeight: 200
});

upload.addEventListener('change', e => {
    if (e.target.files.length) {
        const reader = new FileReader();
        reader.onload = e => {
            if (e.target.result) {
                let img = document.createElement('img');
                img.id  = 'image';
                img.src = e.target.result;
                result.innerHTML = '';
                result.appendChild(img);

                cropper = new Cropper(img, {
                    aspectRatio: 1,
                    viewMode: 1,
                    minCropBoxWidth: 200,
                    minCropBoxHeight: 200
                });
            }
        };
        reader.readAsDataURL(e.target.files[0]);
    }
});

done.addEventListener('click', e => {
    alert('Done!');
    e.preventDefault();
    
    canvas = cropper.getCroppedCanvas({
        width: 400,
        height: 400
    });

    canvas.toBlob(function (response) {
        var reader = new FileReader();
        reader.readAsDataURL(response); 

        reader.onloadend = function() {
            var base64data = reader.result;  
            let receiver = $('#image_data').val(base64data);
        }
    });
});