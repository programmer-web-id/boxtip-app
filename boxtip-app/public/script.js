console.log('log')
let btn_create = document.getElementById('btn-create');
let btn_edit = document.getElementById('btn-edit');
let btn_save = document.getElementById('btn-save');
let btn_discard = document.getElementById('btn-discard');

if (btn_create){
    btn_create.addEventListener('click', function(e){
        location.href += '/create';
    });
}
if (btn_edit){
    btn_edit.addEventListener('click', function(e){
        location.href += '/edit';
    });
}
if (btn_save){
    btn_save.addEventListener('click', function(e){
        document.getElementById('btn-submit').click();
    });
}
if(btn_discard){
    btn_discard.addEventListener('click', function(e){
        location.href = location.href.replace('/edit', '');
    });
}