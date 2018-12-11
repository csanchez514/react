import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import axios from 'axios';
export default class Formulario extends Component {
    constructor() {
        super();
        this.handleSubmit = this.handleSubmit.bind(this);
      }
      handleSubmit(event) {
        event.preventDefault();
        const data = new FormData(event.target);
        fetch('/api/guardar', {
          method: 'POST',
          body: data,
        });
      }
    render() {
        return (
            <form onSubmit={this.handleSubmit}>
                <div >
                    <label for="modo" >Seleccione como va a guardar </label>
                    <select required="required" class="form-control" id="modo" name="modo" >
                            <option selected value="mysql">mysql</option>
                            <option value="Firebase">Firebase</option>   
                    </select>
                </div>
                <div >
                    <label for="nombre" >Ingrese el nombre del Producto </label>
                    <input type="text"  id="nombre" name="nombre" placeholder="Nombre Producto "/>
                </div>
                <div >
                    <label for="precio" >Ingrese el precio </label>
                     <input type="text"  id="precio" name="precio" placeholder="Precio" />
                </div>
                <div >
                    <label for="cantidad" >Ingrese la Cantidad </label>
                    <input type="text"id="cantidad" name="cantidad" placeholder="Cantidad" />
                </div>
                <div >
                    <button  type="submit"class="btn btn-primary" id="save" name="save" >Ingresar</button>
                </div>
            </form>
        );
    }
}
if (document.getElementById('formulario')) {
    ReactDOM.render(<Formulario />, document.getElementById('formulario'));
}
