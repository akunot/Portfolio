import React, { useState } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';

    function Form() {
        const [name, setName] = useState('');
        const [date_birth, setDateOfBirth] = useState('');
        const [nationality, setNationality] = useState('');
        const [biography, setBiography] = useState('');

    const guardarDatos = () => {
        const newActor = {
            name : name,
            date_birth : date_birth,
            nationality : nationality,
            biography : biography
        }

    fetch('http://127.0.0.1:8000/api/actors', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify(newActor)
      })
        .then(res => res.json())
        .then(data => console.log(data))
        .catch(err => console.log(err))
    }

  const handleSubmit = (e) => {
    e.preventDefault();
    guardarDatos();
  };

  return (
    <div className="container">
      <div className="row">
        <div className="col-12">
          <h1>Actors</h1>
        </div>
      </div>

      <div className="row">
        <div className="col-12">
          <form onSubmit={(e) => {
            handleSubmit(e);
            alert('Datos enviados exitosamente!');
          }}>
            <div className="form-group">
              <label htmlFor="name">Name</label>
              <input
                type="text"
                className="form-control"
                id="name"
                value={name}
                onChange={(e) => setName(e.target.value)}
              />
            </div>
            <div className="form-group">
              <label htmlFor="date_birth">Date of birth</label>
              <input
                type="date"
                className="form-control"
                id="date_birth"
                value={date_birth ? new Date(date_birth).toISOString().split('T')[0] : ''}
                onChange={(e) => setDateOfBirth(e.target.value)}/>
            </div>
            <div className="form-group">
              <label htmlFor="nationality">Nationality</label>
              <input
                type="text"
                className="form-control"
                id="nationality"
                value={nationality}
                onChange={(e) => setNationality(e.target.value)} />
            </div>
            <div className="form-group">
              <label htmlFor="biography">Biography</label>
              <textarea
                className="form-control"
                id="biography"
                value={biography}
                onChange={(e) => setBiography(e.target.value)}
              />
            </div>
            <button className="btn btn-primary" type="submit">
              Create Actor
            </button>
          </form>
        </div>        
      </div>
    </div>
  );
}

export default Form;