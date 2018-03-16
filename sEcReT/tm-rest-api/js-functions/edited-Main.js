import React from 'react';
import {
  StyleSheet,
  Text,
  View,
  TextInput,
  ScrollView,
  TouchableOpacity,
} from 'react-native';

import Task from './Task';
import {Platform, StatusBar, KeyboardAvoidingView} from 'react-native';

export default class Main extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      taskArray: [],
      taskText: '',
      descText: '',
    }
  }

  render() {

    let tasks = this.state.taskArray.map((val, key) => {
      return <Task key={key} keyval={key} val={val}
      deleteMethod={()=> this.deleteTask(key)} />
    });
    return (
      <View style={styles.container}>
        <View style={styles.header}>
          <Text style={styles.headerText}>TTH_TaskManager</Text>
        </View>

        <ScrollView style={styles.scrollContainer}>
          {tasks}
        </ScrollView>

        <KeyboardAvoidingView style={styles.footer}>
          <TextInput
            style={styles.textInput}
            onChangeText={
              (taskText) => this.setState(
                {taskText}
              )
            }
            value={this.state.taskText}
            placeholder='Task Title'
            placeholderTextColor='white'
            underlineColorAndroid='transparent'>
          </TextInput>
        
          <TextInput
            style={styles.textInput}
            onChangeText={
              (descText) => this.setState(
                {descText}
              )
            }
            value={this.state.descText}
            placeholder='Task Description'
            placeholderTextColor='white'
            underlineColorAndroid='transparent'>
          </TextInput>
        </KeyboardAvoidingView>

        <TouchableOpacity onPress={this.addTask.bind(this)} style={styles.addButton}>
          <Text style={styles.addButtonText}>+</Text>
        </TouchableOpacity>

        <TouchableOpacity onPress={this.updateTask.bind(this)} style={styles.updateButton}>
          <Text style={styles.addButtonText}>-</Text>
        </TouchableOpacity>


      </View>
    );
  }

  addTask() {
    if (this.state.taskText) {
      var d = new Date();
      this.state.taskArray.push({
        'date': d.getFullYear() +
        "/" + (d.getMonth() + 1) +
        "/" + d.getDate(),
        'task': this.state.taskText,
        'desc': this.state.descText
      });
      this.setState({taskArray: this.state.taskArray})
      this.setState({taskText: ''});
      this.setState({descText: ''});
    }
  }

  updateTask(){
  	var title = 'New';
  	var description = 'Testing 123';
    var d = new Date();

  	this.state.taskArray.push({
  		'date': d.getFullYear() +
        "/" + (d.getMonth() + 1) +
        "/" + d.getDate(),
        'task': title,
        'desc': description
  	});
  	 this.setState({taskArray: this.state.taskArray})
      this.setState({taskText: ''});
      this.setState({descText: ''});
  }

  deleteTask(key) {
    this.state.taskArray.splice(key, 1);
    this.setState({taskArray: this.state.taskArray})
  }
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
  },

  header: {
    backgroundColor: '#E91E63',
    alignItems: 'center',
    justifyContent: 'center',
    borderBottomWidth: 10,
    borderBottomColor: '#ddd',
    paddingTop: Expo.Constants.statusBarHeight,
  },

  headerText: {
    color: 'white',
    fontSize: 18,
    padding: 26,
  },

  scrollContainer: {
    flex: 1,
    marginBottom: 100,
  },

  footer: {
    position: 'absolute',
    bottom: 0,
    left: 0,
    right: 0,
    zIndex: 10,
  },

  textInput: {
    alignSelf: 'stretch',
    color: '#fff',
    padding: 20,
    backgroundColor: '#252525',
    borderTopWidth: 2,
    borderTopColor: '#ededed',
  },

  addButton: {
    position: 'absolute',
    zIndex: 11,
    right: 20,
    bottom: 90,
    backgroundColor: '#E91E63',
    width: 75,
    height: 75,
    borderRadius: 50,
    alignItems: 'center',
    justifyContent: 'center',
    elevation: 8,
  },

  updateButton: {
    position: 'absolute',
    zIndex: 11,
    left: 20,
    bottom: 90,
    backgroundColor: '#E91E63',
    width: 75,
    height: 75,
    borderRadius: 50,
    alignItems: 'center',
    justifyContent: 'center',
    elevation: 8,
  },

  addButtonText: {
    color: '#fff',
    fontSize: 24,
  },
});
