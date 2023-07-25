import { Component, OnInit } from '@angular/core';
import { ApiService } from '../api.service';

@Component({
  selector: 'app-person-list',
  templateUrl: './person-list.component.html',
  styleUrls: ['./person-list.component.css']
})
export class PersonListComponent implements OnInit {
  people: any[] | undefined;

  constructor(private apiService: ApiService) { }

  ngOnInit() {
    this.getPeople();
  }

  getPeople() {
    this.apiService.getPeople().subscribe(data => {
      this.people = data;
    });
  }

  editPerson(id: number) {
    // Falta implementar a navegação para a página de edição da pessoa com o ID fornecido.
    // Por exemplo:
    // this.router.navigate(['/edit', id]);
  }

  deletePerson(id: number) {
    if (confirm('Você tem certeza de que deseja excluir essa pessoa?')) {
      this.apiService.deletePerson(id).subscribe(data => {
        console.log('Pessoa excluída com sucesso:', data);
        // Atualizando a lista de pessoas após a exclusão para que ela seja refletida no front-end.
        this.getPeople();
      });
    }
  }
}
