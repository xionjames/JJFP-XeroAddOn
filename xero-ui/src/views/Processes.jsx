
import React, { useState } from 'react';
import gql from 'graphql-tag';
import { useQuery } from '@apollo/react-hooks';

// reactstrap components
import {
  Button,
  Card,
  CardHeader,
  CardBody,
  CardTitle,
  Table,
  Row,
  Col
} from "reactstrap";

/* GraphQL begin */
const PROCESSES_QUERY = gql`
  {
    processes {
      Operation
      StartedAt
      State
      UpdatedAt
      _id
    }
  }`;

const LOG_QUERY = gql`
query Log($pid : String!){
  log(processId: $pid) {
    Action
    State
    Date
    Records
  }
}`;
function ProcessesList(props) {
  const handleProcess = (event) => {
    //alert(event.target.value);
    props.onProcessChange(event.target.value);
  };

  const { loading, error, data } = useQuery(
    PROCESSES_QUERY, 
    {
      pollInterval: 15000, 
      fetchPolicy: 'no-cache'
    });

  if (loading) return (<tr><td colSpan="5" className="text-center">Loading data...</td></tr>);
  if (error) return (<tr><td colSpan="5" className="text-center">Error! ${error.message}</td></tr>);
  if (!loading && !error) {
    data.processes = data.processes.sort((a,b) => a.StartedAt > b.StartedAt ? -1 : 1);
  }

  return (
    data.processes.map(it => (
      <tr>
        <td className="text-center">{it.Operation === 'FETCH' ? <i class="fa fa-download" title="Fetch" /> : <i class="fa fa-upload" title="Fetch" />}</td>
        <td className="text-center">{it.StartedAt.replace('+00:00', '').replace('T', ' ')}</td>
        <td className="text-center">{it.State === 'COMPLETED' ? <i class="fa fa-check ok" /> : <i class="fa fa-times fail" />}</td>
        <td className="text-center">{it.UpdatedAt.replace('+00:00', '').replace('T', ' ')}</td>
        <td className="text-center">
          <Button color="link" value={it._id} onClick={handleProcess.bind(this)}><i className="fa fa-eye"></i></Button>
        </td>
      </tr>
    ))
  );
}

function LogList(props) {
    const { loading, error, data } = useQuery(
      LOG_QUERY, 
      {
        variables: {pid: props.processId}, 
        fetchPolicy: 'no-cache'
      });

    if (loading) return (<tr><td colSpan="5" className="text-center">Loading data...</td></tr>);
    if (error) return (<tr><td colSpan="5" className="text-center">{(props.processId ? error.message : props.processId === '' ? 'Select one process first to see log.' : 'Ups! Something was wrong retrieving the data. Please, try again.')}</td></tr>);

    return (
      data.log.map(it => (
        <tr>
          <td>{it.Action} <br /> {it.Records ? <small>{it.Records}</small> : <i></i> }</td>
          <td className="text-center">{it.State === 'OK' ? <i class="fa fa-check ok" /> : <i class="fa fa-times fail" />}</td>
          <td className="text-center">{it.Date.replace('+00:00', '').replace('T', ' ')}</td>
        </tr>
      ))
    )
}

class Processes extends React.Component {
  constructor(props) {
    super(props);
    this.handleProcessChange = this.handleProcessChange.bind(this);
    this.state = {processId: ''};
  }

  handleProcessChange(pid) {
    this.setState({processId: pid});
  }

  render() {
    return (
      <>
        <div className="content">
          <Row>
            <Col md="6">
              <Card>
                <CardHeader>
                  <CardTitle tag="h4">Sync Processes</CardTitle>
                  <p className="card-category">
                    Sync data with Xero
                  </p>
                </CardHeader>
                <CardBody>
                  <Table responsive>
                    <thead className="text-primary">
                      <tr>
                        <th className="text-center">Type</th>
                        <th className="text-center">Started At</th>
                        <th className="text-center">State</th>
                        <th className="text-center">Finished At</th>
                        <th>&nbsp;</th>
                      </tr>
                    </thead>
                    <tbody>
                      <ProcessesList onProcessChange={this.handleProcessChange} />
                    </tbody>
                  </Table>
                </CardBody>
              </Card>
            </Col>
            <Col md="6">
              <Card>
                <CardHeader>
                  <CardTitle tag="h4">Process Log</CardTitle>
                  <p className="card-category">
                    Execution Details for Process
                  </p>
                </CardHeader>
                <CardBody>
                  <Table responsive>
                    <thead className="text-primary">
                      <tr>
                        <th>Action</th>
                        <th className="text-center">State</th>
                        <th className="text-center">Updated At</th>
                      </tr>
                    </thead>
                    <tbody>
                      <LogList processId={this.state.processId} />
                    </tbody>
                  </Table>
                </CardBody>
              </Card>
            </Col>
          </Row>
        </div>
      </>
    );
  }
}

export default Processes;
