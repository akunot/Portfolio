import React, { useState } from 'react';
import 'bootstrap/dist/css/bootstrap.min.css';

export default function Table() {
  const [actors, setActors] = useState([]);

  function fetchData() {
    fetch('http://127.0.0.1:8000/api/actors')
      .then((response) => response.json())
      .then((data) => {
        setActors(data);
      });
  }

  function deleteActor(id) {
    fetch(`http://127.0.0.1:8000/api/actors/${id}`, {
      method: 'DELETE',
    })
      .then((response) => response.json())
      .then((data) => {
        setActors(data);
      });
  }
  

  return (
    <div className="container">
      <div className="row">
        <div className="col-12">
          <h1>Actors</h1>
          <button className="btn btn-primary" onClick={fetchData}>
            Fetch Data
          </button>
        </div>
      </div>

      <div className="row">
        <div className="col-12">
          <table className="table table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date of birth</th>
                <th>Nationality</th>
                <th>Biography</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              {actors.map((actor) => (
                <tr key={actor.id}>
                  <td>{actor.id}</td>
                  <td>{actor.name}</td>
                  <td>{actor.date_birth}</td>
                  <td>{actor.nationality}</td>
                  <td>{actor.biography}</td>
                  <td>
                    <button
                      className="btn btn-primary"
                      onClick={() => deleteActor(actor.id)}
                    >
                      Delete
                    </button>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}
