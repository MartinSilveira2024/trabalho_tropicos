
document.addEventListener("DOMContentLoaded", () => {
    listarTodos();
});


function listarTodos() {

    fetch("listar.php",

        {
      
            method: "GET",

            
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )

       
        .then(response => response.json())

       
        .then(docs => inserirdocs(docs))


        .catch(error => console.log(error));
}

function inserirdocs(docs) {

 
    for (const doc of docs) {
        inserirdoc(doc);
    }

}


function inserirdoc(doc) {

    let tbody = document.getElementById('docs');
    let tr = document.createElement('tr');
    let tdId = document.createElement('td');
    tdId.innerHTML = doc.id_documento;
    let tdnome = document.createElement('td');
    tdnome.innerHTML = doc.nome_doc;
    let tdtipo = document.createElement('td');
    tdtipo.innerHTML = doc.tipo_doc;
    let tddata = document.createElement('td');
    tddata.innerHTML = doc.data_emissao;
    let tdAlterar = document.createElement('td');
    let btnAlterar = document.createElement('button');
    btnAlterar.innerHTML = "Alterar";
    btnAlterar.addEventListener("click", buscadoc, false);
    btnAlterar.id_documento = doc.id_documento;
    tdAlterar.appendChild(btnAlterar);
    let tdExcluir = document.createElement('td');
    let btnExcluir = document.createElement('button');
    btnExcluir.addEventListener("click", excluir, false);
    btnExcluir.id_doc = doc.id_documento;
    btnExcluir.innerHTML = "Excluir";
    tdExcluir.appendChild(btnExcluir);

    tr.appendChild(tdId);
    tr.appendChild(tdnome);
    tr.appendChild(tdtipo);
    tr.appendChild(tddata);
    tr.appendChild(tdAlterar);
    tr.appendChild(tdExcluir);

    tbody.appendChild(tr);
}


function excluir(evt) {

    let id_doc = evt.currentTarget.id_doc;
    let excluir = confirm("Você tem certeza que deseja excluir essa ficção?");

    if (excluir == true) {
        fetch('excluir.php?id_documento=' + id_doc,
            {
                method: "GET",
                headers: { 'Content-Type': "application/json; charset=UTF-8" }
            }
        )
            .then(response => response.json())
            .then(retorno => excluirdoc(retorno, id_doc))
            .catch(error => console.log(error));
    }
}

function excluirdoc(retorno, id_doc) {
    if (retorno == true) {
        let tbody = document.getElementById('docs');
        for (const tr of tbody.children) {
            if (tr.children[0].innerHTML == id_doc) {
                tbody.removeChild(tr);
            }
        }
    }
}
function alterardoc(docus) {
    let tbody = document.getElementById('docs');
    for (const tr of tbody.children) {
        if (tr.children[0].innerHTML == docus.id_documento) {
            tr.children[1].innerHTML = docus.nome_doc;
            tr.children[2].innerHTML = docus.tipo_doc;
            tr.children[3].innerHTML = docus.data_emissao;
        }
    }
}

function buscadoc(evt) {
    let id_doc = evt.currentTarget.id_documento;
    fetch('buscadoc.php?id_doc=' + id_doc,
        {
            method: "GET",
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(docs => preencheForm(docs))
        .catch(error => console.log(error));
}

function preencheForm(docs) {
    let inputIDFiccao = document.getElementsByName("id_documento")[0];
    inputIDFiccao.value = docs.id_documento;
    let inputTema = document.getElementsByName("nome_doc")[0];
    inputTema.value = docs.nome_doc;
    let inputAutor = document.getElementsByName("tipo_doc")[0];
    inputAutor.value = docs.tipo_doc;
    let inputDescricao = document.getElementsByName("data_emissao")[0];
    inputDescricao.value = docs.data_emissao;
}
function salvardocs(event) {
    event.preventDefault();

    let inputIDdoc = document.getElementsByName("id_documento")[0];
    let id_doc = inputIDdoc.value;
    let inputTema = document.getElementsByName("nome_doc")[0];
    let nome_doc = inputTema.value;
    let inputtipo = document.getElementsByName("tipo_doc")[0];
    let tipo_doc = inputtipo.value;
    let inputdata = document.getElementsByName("data_emissao")[0];
    let data_emissao = inputdata.value;

   
    if (id_doc == "") {

      
        cadastrar(id_doc, nome_doc, tipo_doc, data_emissao);

    } else {

 
        alterar(id_doc, nome_doc, tipo_doc, data_emissao);
    }

    document.getElementsByTagName('form')[0].reset();
}

function cadastrar(id_doc, nome_doc, tipo_doc, data_emissao) {

    fetch('inserir.php',
        {
            method: 'POST',
            body: JSON.stringify({

        
                id_documento: id_doc,
                nome_doc: nome_doc,
                tipo_doc: tipo_doc,
                data_emissao: data_emissao
            }),
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(docs => inserirdocs(docs))
        .catch(error => console.log(error));
}

function alterar(id_doc, nome_doc, tipo_doc, data_emissao) {

    fetch('alterar.php',
        {
            method: 'POST',
            body: JSON.stringify({
                id_documento: id_doc,
                nome_doc: nome_doc,
                tipo_doc: tipo_doc,
                data_emissao: data_emissao
            }),
            headers: { 'Content-Type': "application/json; charset=UTF-8" }
        }
    )
        .then(response => response.json())
        .then(docus => alterardoc(docus))
        .catch(error => console.log(error));
}