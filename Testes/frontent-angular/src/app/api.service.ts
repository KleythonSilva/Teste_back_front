import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class ApiService {
  private baseUrl = 'http://localhost:8000/api';

  constructor(private http: HttpClient) { }

  // APIs para pessoas
  getPeople(): Observable<any> {
    return this.http.get(`${this.baseUrl}/people`);
  }

  createPerson(data: any): Observable<any> {
    return this.http.post(`${this.baseUrl}/people`, data);
  }

  updatePerson(id: number, data: any): Observable<any> {
    return this.http.put(`${this.baseUrl}/people/${id}`, data);
  }

  deletePerson(id: number): Observable<any> {
    return this.http.delete(`${this.baseUrl}/people/${id}`);
  }

  // Função para buscar detalhes de uma pessoa pelo ID
  getPerson(personId: number): Observable<any> {
    return this.http.get(`${this.baseUrl}/people/${personId}`);
  }
  
  // APIs para contatos
  createContact(personId: number, data: any): Observable<any> {
    return this.http.post(`${this.baseUrl}/people/${personId}/contacts`, data);
  }

  updateContact(personId: number, contactId: number, data: any): Observable<any> {
    return this.http.put(`${this.baseUrl}/people/${personId}/contacts/${contactId}`, data);
  }

  deleteContact(personId: number, contactId: number): Observable<any> {
    return this.http.delete(`${this.baseUrl}/people/${personId}/contacts/${contactId}`);
  }
}
