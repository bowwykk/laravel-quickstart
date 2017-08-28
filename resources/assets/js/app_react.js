import React, { Component } from 'react';
import ReactDom from 'react-dom';

class TaskItem extends Component {
  render() {
    return <tr>
      <td className="table-text">
        <div>name: {this.props.name}</div>
      </td>
      <td>
        <button className='btn btn-primary' onClick={this.props.onEdit.bind(this, this.props.id, this.props.name)}>Edit</button>
      </td>
      <td>
        <button className='btn btn-danger' onClick={this.props.onDeleteItme}>Delete</button>
      </td>
    </tr>
  }
}

class TaskApp extends Component {
  constructor(props) {
    super(props);
    this.state = {
      listTask: ["aaa", "bbb", "ccc"],
      task: '',
      value: false,
      edit_id: ''
    };
  }

  addTask(e) {
    console.log(this.state)
    if (!this.state.value) {
      this.setState({
        listTask: this.state.listTask.concat(this.state.task)
      })
    }
    else {
      var newListTask = [...this.state.listTask]
      newListTask[this.state.edit_id] = document.getElementById("txt_name").value 
      this.setState({ 
        listTask: newListTask,
      value: false
     });
    }
    document.getElementById("txt_name").value = ""
    e.preventDefault();
  }

  cancle() {
    this.setState({ 
        listTask: newListTask,
      value: false
     })
     document.getElementById("txt_name").value = ""
  }

  change(e) {
    e.preventDefault();
    this.setState({ task: e.target.value })
  }

  deleteTask(id) {
    var listTask = this.state.listTask;
    listTask.splice(id, 1);
    this.setState({ listTask });
  }


  editTask(index, name) {
    document.getElementById("txt_name").value = name;
    this.setState({
      value: true,
      edit_id: index
    })
    console.log(index)
  }

  render() {
    return <div>
      <form onSubmit={this.addTask.bind(this)} >
        <input type="text" id='txt_name' className="form-control" onChange={this.change.bind(this)} />
        <button className="btn btn-default">
          {this.state.value ? 'Update' : 'Add Task'}
        </button>
      </form>
      <table className='table table-striped task-table'>
        <tbody>
          {this.state.listTask.map(function (task, index) {
            return <TaskItem name={task} key={index} id={index} onDeleteItme={this.deleteTask.bind(this, index)} onEdit={this.editTask.bind(this)} />
          }.bind(this))}
        </tbody>
      </table>
    </div>
  }
}

ReactDom.render(
  <TaskApp />,
  document.getElementById('root')
);