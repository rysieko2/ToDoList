var number = 0;

document.getElementById("p0").innerHTML = ("jjk");

function addTask() {
    number++;
    var node = document.createElement("p")
    node.setAttribute("id","p"+number)
    node.setAttribute("draggable","true")
    var getAdd = document.getElementById("add_todo").value
    var textnode = document.createTextNode(getAdd);
    node.appendChild(textnode);
    document.getElementById("todo").appendChild(node);

    var node2 = document.createElement("i")
    node2.setAttribute("id","i"+number)
    node2.setAttribute("class","icon-trash")
    node2.setAttribute("onclick","delet(this.id)")

    document.getElementById("p"+number).appendChild(node2);
    document.getElementById("add_todo").value ="";
}
function save(){
  
  var getAdd = document.getElementById("p0").value



}


function delet(clicked_id){
      var t_id = clicked_id.replace("i","p")
      document.getElementById(t_id).remove()
}


class App {

  static init() {
  
    App.box = document.getElementsByClassName('box').remove()
  
    App.box.addEventListener("dragstart", App.dragstart)
    App.box.addEventListener("dragend", App.dragend)
  
    const containers = document.getElementsByClassName('holder')
  
    for(const container of containers) {
      container.addEventListener("dragover", App.dragover)
      container.addEventListener("dragenter", App.dragenter)
      container.addEventListener("dragleave", App.dragleave)
      container.addEventListener("drop", App.drop)
    }
  }
  
  static dragstart() {
    this.className += " held"
  
    setTimeout(()=>this.className="invisible", 0)
  }
  
  static dragend() {
    this.className = "box"
  }
  
  static dragover(e) {
    e.preventDefault()
  }
  
  static dragenter(e) {
    e.preventDefault()
    this.className += " hovered"
  }
  
  static dragleave() {
    this.className = "holder"
  }
  
  static drop() {
    this.className = "holder"
    this.append(App.box)
  }
  
  }
  
  document.addEventListener("DOMContentLoaded", App.init)
