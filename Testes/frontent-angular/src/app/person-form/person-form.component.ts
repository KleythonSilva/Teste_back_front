// src/app/person-form/person-form.component.ts
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ApiService } from '../api.service';

@Component({
  selector: 'app-person-form',
  templateUrl: './person-form.component.html',
  styleUrls: ['./person-form.component.css']
})
export class PersonFormComponent implements OnInit {
  formData: any = {};
  person: any = null;

  constructor(
    private route: ActivatedRoute,
    private router: Router,
    private apiService: ApiService
  ) { }

  ngOnInit() {
    this.route.paramMap.subscribe(params => {
      const personId = params.get('id');
      if (personId) {
        this.getPersonDetails(+personId);
      } else {
        this.person = {}; // Inicializa a pessoa como objeto vazio para a criação
      }
    });
  }

  getPersonDetails(personId: number) {
    this.apiService.getPerson(personId).subscribe(data => {
      this.person = data;
    });
  }

  createPerson() {
    this.apiService.createPerson(this.formData).subscribe(data => {
      console.log('Person created successfully:', data);
    });
  }

  updatePerson(id: number) {
    this.apiService.updatePerson(id, this.formData).subscribe(data => {
      console.log('Person updated successfully:', data);
    });
  }

  addContact() {
    if (!this.person.contacts) {
      this.person.contacts = [];
    }
    this.person.contacts.push({ type: '', value: '' });
  }

  removeContact(index: number) {
    this.person.contacts.splice(index, 1);
  }
}
