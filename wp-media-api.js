window.onload = () =>{
    const wpMediaShow = (text, callback) =>{
        let uploader = false;
        if(uploader) return uploader.open();
    
        uploader = wp.media({
            title: text+"の選択",
            library: {
                type: "image"
            },
            button: {
                text: "選択"
            },
            multiple: false
        });
    
        uploader.on("select", () =>{
            (uploader.state().get("selection")).each((data) =>{
                const url = data.attributes.url;
                callback(url);
            });
        });
    
        uploader.open();
    }
    
    document.querySelector("#media_upload_btn_logo").onclick = () =>{
        wpMediaShow("ロゴ", () =>{
            document.getElementById("media_logo_url").value = url;
            document.getElementById("media_logo_img").src = url;
            document.getElementById("media_logo_img").style.display = "";
        });
    }

    document.querySelector("#media_upload_btn_bg").onclick = () =>{
        wpMediaShow("背景画像", () =>{
            document.getElementById("media_bg_url").value = url;
            document.getElementById("media_bg_img").src = url;
            document.getElementById("media_bg_img").style.display = "";
        });
    }

    document.getElementById("media_logo_url").onchange = () =>{
        document.getElementById("media_logo_img").src = document.getElementById("media_logo_url").value;
        document.getElementById("media_logo_img").style.display = "";
    };

    document.getElementById("media_bg_url").onchange = () =>{
        document.getElementById("media_bg_img").src = document.getElementById("media_logo_url").value;
        document.getElementById("media_bg_img").style.display = "";
    };
}
