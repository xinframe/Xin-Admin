import {useLocation, useNavigate, FormattedMessage} from '@umijs/max'
import {useEffect, useState} from "react";
import {getMenuData, PageContainer} from "@ant-design/pro-components";
import type { TabsProps } from 'antd';
import './index.less';
import { useModel } from '@umijs/max';
import {ConfigProvider} from "antd";
const XinTabs = (props: {children: never[]}) => {
  const location = useLocation();
  const navigate = useNavigate();
  const [activeKey, setActiveKey] = useState<string>('');
  const [tabsItem, setTabsItem] = useState<Exclude<TabsProps['items'], undefined>>([
    {key: '/dashboard/analysis', label: <FormattedMessage id="menu.dashboard.analysis" />, closeIcon: null}
  ]);

  const {initialState} = useModel('@@initialState');

  // @ts-ignore
  const {breadcrumb } = getMenuData(initialState?.menus);

  useEffect(() => {
    const menuDataItem = breadcrumb[location.pathname];
    if(!menuDataItem) return
    const inTabs = tabsItem.some((item) => {
      return item.key === location.pathname
    })
    if (!inTabs) {
      setTabsItem([...tabsItem, {
        key: location.pathname,
        label: menuDataItem.locale?<FormattedMessage id={menuDataItem.locale} />: menuDataItem.name
      }]);
    }
    setActiveKey(location.pathname)
  }, [location])

  const onEdit: TabsProps['onEdit'] = (key, action) => {
    if (action === 'remove') {
      let itemIndex = tabsItem.findIndex((item) => item.key === key)
      tabsItem.splice(itemIndex, 1)
      setTabsItem([...tabsItem])
    }
  }

  const onClick: TabsProps['onTabClick'] = (key) => {
    navigate(key, {replace: true})
  }


  const tabProps: TabsProps = {
    size: 'large',
    activeKey: activeKey,
    type: "editable-card",
    tabBarGutter: 5,
    hideAdd: true,
    items: tabsItem,
    onTabClick: onClick,
    onEdit: onEdit,
  }


  return (
    <ConfigProvider
      theme={{
        components: {
          Tabs: {
            cardGutter: 100
          },
        },
        token: {
          /* here is your global tokens */
        },
      }}
    >
      <PageContainer
        header={{title: null}} tabProps={tabProps} tabList={tabProps.items} breadcrumb={{}}>
        {props.children}
      </PageContainer>
    </ConfigProvider>
  )
}

export default XinTabs
