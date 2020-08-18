// selector
document.querySelector();
document.querySelectorAll();
document.getElementById();
document.getElementsByClassName();
document.getElementsByTagName();

// change element
element.innerHTML
element.<attribute>
element.style.<property>
element.setAttribute(attribute, value)

// add/delete element
document.createElement(element)
document.removeChild(element)
document.appendChild(element)
document.replaceChild(old,new)
document.write(text);

// node relationship
html -parentNode
head -firstChild/previousSibling
body -lastChild/nextSibling

// navigating nodes
element.parentNode
element.childNodes[nodenumber]
element.firstChild
element.lastChild
element.nextSibling
element.previousSibling

element.nodeName
element.nodeType
element.nodeValue

// create node
let para = document.createElement(tag)
let node = document.createTextNode(text)
para.appendChild(node)

// insert node
element.appendChild(node)
element.insertBefore(para, child)

// delete node
element.remove()
element.removeChild(child)

// replace node
element.replaceChild(para, child)