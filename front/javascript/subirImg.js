$("#subirimagen").change(function(){
    $("#btn-subirimg").prop("disabled", this.files.length == 0);
});

/*
Autor: Fco. Manuel Martínez Vázquez
*/