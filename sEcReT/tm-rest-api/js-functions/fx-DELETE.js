import React, {Component} from 'react';
import {
  AppRegistry,
  StyleSheet,
  ActivityIndicator,
  Text,
  View,
  ListView,
  Button,
  TextInput
}from 'react-native';

export default class FetchWpTasks extends Component{

  constructor(props){
    super(props);
    this.state = {
      isLoading: true,
      cloneTask: [],
      taskPage: '',
      taskId: '',
      permaDel: ''
    }
    
  }

  deleteTask = (data) =>{
    const{taskId} = this.state;
        this.state = {permaDel: data};

    const{permaDel} = this.state;

    fetch('http://192.168.1.176/tm-rest-api/deleteTask.php', {
      method: 'post',
      header:{
        'Accept': 'aplication/json',
        'Content-type': 'application/json'
      },
      body:JSON.stringify({
        id: taskId,
        forceDelete: permaDel,
      })
    })
    .then((response) => response.json)
      .then((responseJson) => {
        alert("Deleted!");
      })
      .catch((error) => {
        console.error(error);
      });
  }

  componentDidMount(){
    const{taskPage} = this.state;
    const{taskId} = this.state;

    fetch('http://192.168.1.176/tm-rest-api/getTask.php', {
      method: 'post',
      header:{
        'Accept': 'aplication/json',
        'Content-type': 'application/json'
      },
      body:JSON.stringify({
        id: taskId,
        page: taskPage,
      })
    })
    .then((response) => response.json())
    .then((responseJson) => {
      var standardDataSource = new ListView.DataSource({rowHasChanged: (r1, r2) => r1 !== r2});
      this.setState({
        isLoading: false,
        cloneTask: standardDataSource.cloneWithRows(responseJson)
      });
      
    })
  }

  render(){
    if(this.state.isLoading){
      return(
        <View>
          <ActivityIndicator />
        </View>
      )
    }

    return(
      <View style={styles.container}>
       <TextInput 
          placeholder="Enter Id"
          style={{width:200,margin:10}}
          onChangeText={taskId => this.setState({taskId})}
        />

        <Button title="Trash"
        onPress={this.deleteTask.bind(this,'no')}
        color="magenta"/>

        <Button title="Delete"
        onPress={this.deleteTask.bind(this,'yes')}
        color="magenta"/>

        <ListView 
          dataSource ={this.state.cloneTask}
          renderRow={
            (rowData) => <Text>
              Id: {rowData.id}, 
              Title: {rowData.title}, 
              Description: {rowData.description}, 
              Deadline: {rowData.deadline}
            </Text>
          }
        >

        </ListView>
      </View>
    );
  }
}
const styles = StyleSheet.create({
  container: {
    flex: 1,
  },
});
