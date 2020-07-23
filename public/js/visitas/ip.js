window.addEventListener("load", function() {

fetch("http://api.ipify.org/?format=json")
          .then(response => response.json())
          .then(data =>{
            let ip = $('#ip');
            ip.val(data.ip);
            let formData = new FormData();
            formData.append('ip',ip.val());
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "/visitas/ip",
                data: formData,
                type: 'post',
                dataType: 'JSON',
                processData: false,
                contentType: false,
                cache: false,
                success: function(response) {
                },
            });
          })
          .catch(err => console.log(err));

});
